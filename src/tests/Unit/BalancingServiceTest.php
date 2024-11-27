<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\BalancingService;
use App\Models\Player;
use App\Models\RpgClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Sequence;


class BalancingServiceTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        RpgClass::factory()->create(['name' => 'Guerreiro']);
        RpgClass::factory()->create(['name' => 'Mago']);
        RpgClass::factory()->create(['name' => 'Arqueiro']);
        RpgClass::factory()->create(['name' => 'Clérigo']);
    }

    /** @test */
    public function testBalanceOfGuildsHappyPath()
    {

        Player::factory()->count(10)
            ->state(new Sequence(
                ['class_id' => RpgClass::where('name', 'Guerreiro')->first()->id],
                ['class_id' => RpgClass::where('name', 'Mago')->first()->id],
                ['class_id' => RpgClass::where('name', 'Arqueiro')->first()->id],
                ['class_id' => RpgClass::where('name', 'Clérigo')->first()->id]
            ))
            ->create(['confirmed' => true]);

        $players = Player::all();

        $balancingService = new BalancingService();
        $guilds = $balancingService->balanceGuilds($players, 2);

        foreach ($guilds as $guild) {
            $this->assertNotEmpty($guild, 'Cada guilda deve ter jogadores.');

            $guildCollection = collect($guild->players); 

            $this->assertTrue(
                $guildCollection->contains(fn($player) => $player->class->name === 'Clérigo'),
                'Cada guilda deve ter pelo menos um Clérigo.'
            );
            
            $this->assertTrue(
                $guildCollection->contains(fn($player) => $player->class->name === 'Guerreiro'),
                'Cada guilda deve ter pelo menos um Guerreiro.'
            );
        }
    }

    /** @test */
    public function testBalanceOfGuildsUnhappyPath()
    {

        $rpgClasses = [
            new RpgClass(['id' => 1, 'name' => 'Clérigo']),
            new RpgClass(['id' => 2, 'name' => 'Guerreiro']),

        ];

        $players = collect([
            new Player(['id' => 1, 'name' => 'Player1', 'class' => (object)['name' => 'Clérigo'], 'xp' => 50]),
            new Player(['id' => 2, 'name' => 'Player2', 'class' => (object)['name' => 'Guerreiro'], 'xp' => 30]),

        ]);

        $balancingService = new BalancingService();
        $guilds = $balancingService->balanceGuilds($players, 2);

        $magosIds = RpgClass::where('name', 'Mago')->pluck('id');

        $this->assertTrue(
            $guilds->flatMap(fn($guild) => collect($guild)->pluck('class_id'))->intersect($magosIds)->isEmpty(),
            'Nenhuma guilda deve ter Mago, pois não foi fornecido.'
        );
    }
}