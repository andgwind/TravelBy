<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTravelTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;

    public function test_public_user_cannot_access_adding_travel(): void
    {
        $response = $this->postJson('/api/v1/admin/travels', [
            "isPublic" => "1",
            "name" => "welcome to the japan big trave2",
            "description" => "the big travel to japan. The best travel in the world",
            "numberOfDays" => "10"
        ]);

        $response->assertStatus(401);
    }

    public function test_create_travel_on_user_admin(): void
    {

        $this->seed(RoleSeeder::class);
        $user = User::factory()->create();
        $user->roles()->attach(Role::where('name', 'admin')->value('id'));

        $response = $this->actingAs($user)->postJson('/api/v1/admin/travels', [
            "isPublic" => "1",
            "name" => "welcome to the japan big trave2",
            "description" => "the big travel to japan. The best travel in the world",
            "numberOfDays" => "10"
        ]);

        $response->assertStatus(201);
    }

}
