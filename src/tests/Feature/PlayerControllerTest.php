<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Player;
use App\Models\RpgClass;

class PlayerControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_can_list_players()
    {
        // Player::factory()->count(3)->create();
        $class = RpgClass::factory()->create();
        Player::factory()->count(3)->create(['class_id' => $class->id]);

        $response = $this->getJson('/api/v1/players');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
    public function test_can_create_player()
    {
        $class = RpgClass::create(['name' => 'Druida']);

        $playerData = [
            'name' => 'John Doe',
            'class_id' => $class->id,            
            'xp' => 50,
        ];

        $response = $this->postJson('/api/v1/players', $playerData);

        $response->assertStatus(201)
                 ->assertJson($playerData);

        $this->assertDatabaseHas('players', $playerData);
    }

    /** @test */
    public function test_can_show_player()
    {
        $player = Player::factory()->create();

        $response = $this->getJson("/api/v1/players/{$player->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $player->id,
                     'name' => $player->name,
                     'class_id' => $player->class_id,
                     'xp' => $player->xp,
                 ]);
    }

    /** @test */
    public function test_can_update_player()
    {
        $player = Player::factory()->create();
        $newPlayerData = [
            'name' => 'Jane Doe',
            'class_id' => $player->class_id,
            'xp' => 80,
        ];

        $response = $this->putJson("/api/v1/players/{$player->id}", $newPlayerData);

        $response->assertStatus(200)
                 ->assertJson($newPlayerData);

        $this->assertDatabaseHas('players', $newPlayerData);
    }

    /** @test */
    public function test_can_delete_player()
    {
        $player = Player::factory()->create();

        $response = $this->deleteJson("/api/v1/players/{$player->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('players', ['id' => $player->id]);
    }
}