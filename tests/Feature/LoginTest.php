<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    public function testRequiresEmailAndLogin()
    {
        $this->json('POST', 'api/auth/login')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "email" => ["The email field is required."],
                    "password" => ["The password field is required."]
                ]
            ]);
    }
}
