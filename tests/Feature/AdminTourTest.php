<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\Travel;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTourTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_public_user_cannot_store_new_tour(): void
    {
        $travel = Travel::factory()->create();

        $response = $this->postJson('api/v1/travels/'.$travel->id.'/tours');
        $response->assertStatus(401);
    }

    public function test_create_tour_on_user_admin(): void
    {

        $this->seed(RoleSeeder::class);
        $user = User::factory()->create();
        $user->roles()->attach(Role::where('name', 'admin')->value('id'));
        $travel = Travel::factory()->create();

        $response = $this->actingAs($user)->postJson('api/v1/travels/'.$travel->id.'/tours', [
            'name' => 'big japan',
            'startingDate' => '2022-03-10',
            'endingDate' => '2023-03-15',
            'price' => '1000',
        ]);

        $response->assertStatus(201);
    }
}
