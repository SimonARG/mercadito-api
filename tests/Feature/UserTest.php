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
                        ->where('message', 'User tester99 registered successfully')
            );
    }

    public function test_user_creation_with_missing_fields_returns_a_validation_error_response()
    {
        $missingFields = [
            ['name' => ''],
            ['email' => ''],
            ['password' => ''],
            ['password_confirmation' => ''],
        ];

        foreach ($missingFields as $missingField) {
            $data = array_merge([
                'name' => 'tester99',
                'email' => 'tester99@gmail.com',
                'password' => 'TestPassword.99',
            ], $missingField);

            $response = $this->JSON('POST', '/api/v1/users', $data);
            $response->assertStatus(422);
        }
    }

    public function test_user_creation_with_invalid_fields_returns_a_validation_error_response()
    {
        $invalidFields = [
            ['name' => 'test'],
            ['email' => 'testergmail.com'],
            ['password' => 'Invalid99'],
            ['password_confirmation' => 'Inval'],
        ];

        foreach ($invalidFields as $invalidField) {
            $data = array_merge([
                'name' => 'tester99',
                'email' => 'tester99@gmail.com',
                'password' => 'TestPassword.99',
            ], $invalidField);

            $response = $this->JSON('POST', '/api/v1/users', $data);
            $response->assertStatus(422);
        }
    }
}
