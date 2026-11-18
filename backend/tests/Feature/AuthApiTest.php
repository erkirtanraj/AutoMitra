<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_can_register_and_receive_a_sanctum_token(): void
    {
        $response = $this->postJson('/api/v1/auth/register', [
            'name' => 'AutoMitra Test',
            'email' => 'customer@example.test',
            'phone' => '+919999999999',
            'password' => 'StrongPassword123',
            'password_confirmation' => 'StrongPassword123',
        ]);

        $response->assertCreated()
            ->assertJsonPath('user.email', 'customer@example.test')
            ->assertJsonPath('user.roles.0.slug', 'customer')
            ->assertJsonStructure(['token', 'token_type', 'user']);
    }

    public function test_authenticated_customer_can_view_profile_and_logout(): void
    {
        $this->postJson('/api/v1/auth/register', [
            'name' => 'AutoMitra Test',
            'email' => 'logout@example.test',
            'password' => 'StrongPassword123',
            'password_confirmation' => 'StrongPassword123',
        ])->assertCreated();

        $login = $this->postJson('/api/v1/auth/login', [
            'email' => 'logout@example.test',
            'password' => 'StrongPassword123',
        ])->assertOk();

        $token = $login->json('token');

        $this->withToken($token)
            ->getJson('/api/v1/auth/me')
            ->assertOk()
            ->assertJsonPath('user.email', 'logout@example.test');

        $this->withToken($token)
            ->postJson('/api/v1/auth/logout')
            ->assertOk();

        $this->withToken($token)
            ->getJson('/api/v1/auth/me')
            ->assertUnauthorized();
    }

    public function test_registration_rejects_weak_passwords(): void
    {
        $this->postJson('/api/v1/auth/register', [
            'name' => 'Test',
            'email' => 'weak@example.test',
            'password' => 'short',
            'password_confirmation' => 'short',
        ])->assertUnprocessable()
          ->assertJsonValidationErrors(['password']);
    }
}
