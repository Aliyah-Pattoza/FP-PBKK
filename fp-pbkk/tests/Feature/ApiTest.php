<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_users()
    {
        $response = $this->get('/api/users');  // Use the API prefix

        $response->assertStatus(200);  // Check for 200 OK status
    }

    /** @test */
    public function it_can_create_a_user()
    {
        $response = $this->post('/api/users', [
            'nama_client' => 'John Doe',
            'email_client' => 'john@example.com',
            'phone_client' => '1234567890',
            'points' => 50,
        ]);

        $response->assertStatus(201);  // Check for 201 Created status
    }
}
