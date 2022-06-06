<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/admin');
        $response->assertStatus(200);
    }

    public function testResponseHome() {
        $response = $this->get('/home');
        $response->assertStatus(200);
    }

    public function testAdminCategories() {
        $response = $this->get('/admin/categories');
        $response->assertStatus(200);
    }

    public function testAdminCreate() {
        $response = $this->get('/admin/categories/create');
        $response->assertStatus(200);
    }
}
