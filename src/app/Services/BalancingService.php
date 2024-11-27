<?php

namespace App\Services;


use App\Models\Guild;
use App\Models\Player;
use Illuminate\Support\Collection;

class BalancingService
{
    private array $requiredClasses = ['Clérigo', 'Guerreiro', ['Mago', 'Arqueiro']];

    public function balanceGuilds(Collection $players, int $qtyPerGuild): Collection
    {
        $this->resetPlayersAndGuilds();
        
        $playersByClass = $this->groupAndSortPlayersByClass($players);

        $guilds = collect(range(0, $qtyPerGuild - 1))->map(fn() => Guild::factory()->create()); 

        $this->assignEssentialClassesToGuilds($guilds, $playersByClass);
        $this->distributeRemainingPlayers($guilds, $playersByClass);

        $this->removeEmptyGuilds($guilds);

        return $guilds;
    }

    private function resetPlayersAndGuilds(): void
    {
        Player::query()->update(['guild_id' => null]);

        Guild::query()->delete();
    }

    private function groupAndSortPlayersByClass(Collection $players): Collection
    {
        return $players->filter(fn($player) => isset($player->class) && isset($player->class->name))
            ->groupBy(fn($player) => $player->class->name)
            ->each(fn($groupedPlayers) => $groupedPlayers->sortByDesc('xp'));
    }

    private function assignEssentialClassesToGuilds(Collection $guilds, Collection &$playersByClass): void
    {
        $guilds->each(function (Guild $guild) use (&$playersByClass) { 
            foreach ($this->requiredClasses as $required) {
                $this->addRequiredPlayerToGuild($guild, $playersByClass, $required);
            }
        });
    }


    private function addRequiredPlayerToGuild(Guild $guild, Collection &$playersByClass, $required): void
    {
        $neededPlayer = $this->findAndRemovePlayerFromClass($playersByClass, $required);

        if ($neededPlayer) {
            
            $neededPlayer->guild_id = $guild->id;
            $neededPlayer->save(); 
        }
    }

    private function findAndRemovePlayerFromClass(Collection &$playersByClass, $required)
    {
        $classNames = is_array($required) ? $required : [$required];
        foreach ($classNames as $className) {
            if ($playersByClass->has($className)) {
                return $playersByClass[$className]->shift();
            }
        }
        return null;
    }


    private function distributeRemainingPlayers(Collection $guilds, Collection $playersByClass): void
    {
        $playersByClass->flatten(1)->each(fn($player) => $this->addToNextGuild($guilds, $player));
    }

    private function addToNextGuild(Collection $guilds, $player): void
    {
        $guilds->each(fn($guild) => $guild->load(['players.class'])); 

        foreach ($guilds as $guild) {
            if ($guild->players->count() < 5) {
                $player->guild_id = $guild->id;
                $player->save();
                break;
            }
        }
    }

    private function removeEmptyGuilds(Collection $guilds): void
    {
        $guilds->each(function (Guild $guild) {
            if ($guild->players->count() === 0) {
                $guild->delete();
            }
        });
    }
}