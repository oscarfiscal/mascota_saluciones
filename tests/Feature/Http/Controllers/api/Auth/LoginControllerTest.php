<?php

namespace Tests\Feature\Http\Controllers\api\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSuccessfulLogin()
    {
        $user = User::factory()->create([
           'email' => 'oscar@test.com',
           'password' => bcrypt('sample123'),
        ]);

        $loginData = ['email' => 'oscar@test.com', 'password' => 'sample123'];

        $this->json('POST', 'api/login', $loginData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "user",
               "access_token",
               "message"
            ])
            ->assertJson([
                "message" => "Successful login"
            ]);

        $this->assertAuthenticated();
    }
}
