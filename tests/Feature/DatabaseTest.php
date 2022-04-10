<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function testValidRegistration()
    {
        $count = User::count();

        $response = $this->post('/register', [
            'name' => 'test_test',
            'email' => 'email@email.net',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $newCount = User::count();

        $this->assertNotEquals($count, $newCount);
    }
}
