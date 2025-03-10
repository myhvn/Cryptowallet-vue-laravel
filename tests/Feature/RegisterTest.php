<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{

    public function testBasicTest()
    {
        $response = $this->get('/api/register');

        $response->assertStatus(200);
    }
    // public function testsRegistersSuccessfully()
    // {
    //     $payload = [
    //         'email' => 'john@email.com',
    //         'password' => 'email123',
    //     ];

    //     $this->json('post', '/register', $payload)
    //         ->assertStatus(201)
    //         ->assertJsonStructure([
    //             'data' => [
    //                 'id',
    //                 'email',
    //                 'created_at',
    //                 'updated_at',
    //                 'api_token',
    //             ],
    //         ]);;
    // }

    // public function testsRequiresPasswordEmailAndName()
    // {
    //     $this->json('post', '/register')
    //         ->assertStatus(422)
    //         ->assertJson([
    //             'email' => ['The email field is required.'],
    //             'password' => ['The password field is required.'],
    //         ]);
    // }

    // public function testsRequirePasswordConfirmation()
    // {
    //     $payload = [
    //         'email' => 'john@email.com',
    //         'password' => 'email123',
    //     ];

    //     $this->json('post', '/register', $payload)
    //         ->assertStatus(422)
    //         ->assertJson([
    //             'password' => ['The password confirmation does not match.'],
    //         ]);
    // }
}
