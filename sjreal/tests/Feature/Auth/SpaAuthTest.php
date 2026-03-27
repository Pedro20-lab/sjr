<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SpaAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_using_sanctum_spa_cookie_authentication(): void
    {
        $user = User::factory()->create();

        $this->get('/sanctum/csrf-cookie');

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response
            ->assertOk()
            ->assertJsonPath('user.email', $user->email);

        $this->assertAuthenticatedAs($user);
    }

    public function test_login_fails_with_invalid_credentials(): void
    {
        $user = User::factory()->create();

        $this->get('/sanctum/csrf-cookie');

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors('email');

        $this->assertGuest();
    }
}