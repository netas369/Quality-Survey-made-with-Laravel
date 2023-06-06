<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageLoadingTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testHomePage(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testLoginPage(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
