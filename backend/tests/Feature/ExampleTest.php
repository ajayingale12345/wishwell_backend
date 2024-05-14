<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test if the about page returns a successful response.
     */
    // public function test_the_about_page_returns_a_successful_response(): void
    // {
    //     $response = $this->get('/about');

    //     $response->assertStatus(200);
    // }

    /**
     * Test if the contact page returns a successful response.
     */
    // public function test_the_contact_page_returns_a_successful_response(): void
    // {
    //     $response = $this->get('/contact');

    //     $response->assertStatus(200);
    // }

    /**
     * Test if the login page returns a successful response.
     */
    public function test_the_login_page_returns_a_successful_response(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
