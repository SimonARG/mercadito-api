<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_valid_user_creation_returns_a_successful_response(): void
    {
        $response = $this->JSON('POST', '/api/v1/users', [
            'name' => 'tester99',
            'email' => 'tester99@gmail.com',
            'password' => 'TestPassword.99',
            'password_confirmation' => 'TestPassword.99'
        ]);

        $response
            ->assertStatus(201)
            ->assertJson(fn (AssertableJson $json) =>
                $json->whereType('data.id', 'integer')
                        ->where('data.name', 'tester99')
                        ->where('data.email', 'tester99@gmail.com')
                        ->where('status', 'Success')
                        ->whereType('data.created_at', 'string')
                        ->whereType('data.updated_at', 'string')
                        ->whereType('data.apiToken', 'string')
                        ->where('message', 'User tester99 registered succesfully')
            );
    }

    public function test_user_creation_with_invalid_name_returns_a_validation_error_response(): void
    {
        $response = $this->JSON('POST', '/api/v1/users', [
            'name' => 'aa',
            'email' => 'tester99@gmail.com',
            'password' => 'TestPassword.99',
            'password_confirmation' => 'TestPassword.99'
        ]);

        $response
            ->assertStatus(422);
    }

    public function test_user_creation_with_invalid_email_returns_a_validation_error_response(): void
    {
        $response = $this->JSON('POST', '/api/v1/users', [
            'name' => 'tester99',
            'email' => 'tester99.com',
            'password' => 'TestPassword.99',
            'password_confirmation' => 'TestPassword.99'
        ]);

        $response
            ->assertStatus(422);
    }

    public function test_user_creation_with_invalid_password_returns_a_validation_error_response(): void
    {
        $response = $this->JSON('POST', '/api/v1/users', [
            'name' => 'tester99',
            'email' => 'tester99.com',
            'password' => 'TestPassword',
            'password_confirmation' => 'TestPassword.99'
        ]);

        $response
            ->assertStatus(422);
    }

    public function test_user_creation_without_password_confirmation_returns_a_validation_error_response(): void
    {
        $response = $this->JSON('POST', '/api/v1/users', [
            'name' => 'tester99',
            'email' => 'tester99.com',
            'password' => 'TestPassword',
            'password_confirmation' => 'Test'
        ]);

        $response
            ->assertStatus(422);
    }
}
