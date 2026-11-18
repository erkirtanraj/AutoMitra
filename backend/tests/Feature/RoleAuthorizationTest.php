<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_cannot_access_admin_route(): void
    {
        $registration = $this->postJson('/api/v1/auth/register', [
            'name' => 'Regular Customer',
            'email' => 'role-check@example.test',
            'password' => 'StrongPassword123',
            'password_confirmation' => 'StrongPassword123',
        ])->assertCreated();

        $this->withToken($registration->json('token'))
            ->getJson('/api/v1/admin/access-check')
            ->assertForbidden();
    }
}
