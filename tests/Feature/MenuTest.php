<?php

namespace Tests\Feature;


use App\Menu;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MenuTest extends TestCase
{
    /**
     *
     */
    public function testMenuCreatedCorrectly()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');
        $payload = [
            "name" => "Test Menu",
            "enabledFrom" => "2018-07-30 12:00:00",
            "enabledUntil" => "2018-07-30 16:00:00"
        ];

        $this->json('POST', '/api/menus', $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                "name",
                "enabledFrom",
                "enabledUntil",
                "updated_at",
                "created_at",
                "id"
            ]);
    }
}
