<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\RpgClass;

class RpgClassControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_list_rpg_classes()
    {
        RpgClass::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/classes');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
    public function can_create_rpg_class()
    {
        $classData = [
            'name' => 'New Class',
        ];

        $response = $this->postJson('/api/v1/classes', $classData);

        $response->assertStatus(201)
                 ->assertJson($classData);

        $this->assertDatabaseHas('rpg_classes', $classData);
    }

    /** @test */
    public function can_show_rpg_class()
    {
        $class = RpgClass::factory()->create();

        $response = $this->getJson("/api/v1/classes/{$class->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $class->id,
                     'name' => $class->name,
                 ]);
    }

    /** @test */
    public function can_update_rpg_class()
    {
        $class = RpgClass::factory()->create();
        $updateData = ['name' => 'Updated Class'];

        $response = $this->putJson("/api/v1/classes/{$class->id}", $updateData);

        $response->assertStatus(200)
                 ->assertJson($updateData);

        $this->assertDatabaseHas('rpg_classes', $updateData);
    }

    /** @test */
    public function can_delete_rpg_class()
    {
        $class = RpgClass::factory()->create();

        $response = $this->deleteJson("/api/v1/classes/{$class->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('rpg_classes', ['id' => $class->id]);
    }
}