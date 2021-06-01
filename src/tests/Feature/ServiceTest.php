<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/api/people');

        $response->assertStatus(200);
    }

    public function test_example2()
    {
        $response = $this->get('/api/people/2');

        $response->assertStatus(200);
    }

    public function test_example3()
    {
        $response = $this->get('/api/shiporders');

        $response->assertStatus(200);
    }

    public function test_example4()
    {
        $response = $this->get('/api/shiporders/3');

        $response->assertStatus(200);
    }

}
