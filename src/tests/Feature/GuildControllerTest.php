<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Player;
use App\Services\BalancingService;
use Mockery;

class GuildControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_forms_guilds_successfully()
    {
        
        $balanceServiceMock = Mockery::mock(BalancingService::class);
        $this->app->instance(BalancingService::class, $balanceServiceMock);

        $balanceServiceMock->shouldReceive('balanceGuilds')
            ->andReturn(collect([['guild1' => 'data'], ['guild2' => 'data']]));

        Player::factory()->count(10)->create(['confirmed' => true]);

        $response = $this->postJson('/api/v1/form-guilds', [
            'number_of_guilds' => 3
        ]);


        $response->assertStatus(200)
                 ->assertJson([
                     ['guild1' => 'data'],
                     ['guild2' => 'data']
                 ]);
    }

    /** @test */
    public function it_requires_qty_per_guild()
    {
        $response = $this->postJson('/api/v1/form-guilds', []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['number_of_guilds']);
    }

    /** @test */
    public function qty_per_guild_must_be_an_integer()
    {
        $response = $this->postJson('/api/v1/form-guilds', [
            'number_of_guilds' => 'not-an-integer'
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['number_of_guilds']);
    }

    /** @test */
    public function qty_per_guild_must_be_at_least_one()
    {
        $response = $this->postJson('/api/v1/form-guilds', [
            'number_of_guilds' => 0
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['number_of_guilds']);
    }
}