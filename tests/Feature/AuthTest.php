<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;

    public function test_register_new_user()
    {
        $response = $this->postJson('/api/v1/register', [
            'name' => 'name',
            'email' => 'test@mail.ru',
            'password' => 'password'
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure(['data' => ['name', 'email']]);
    }


    public function test_login_returns_token_with_valid_credentials(): void
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/v1/login',[
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);
    }
}