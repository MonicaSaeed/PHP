<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use RefreshDatabase;
use Tests\TestCase;

class FormValidationTest extends TestCase
{
    

    /**
     * Test form submission with valid data.
     */
    public function test_form_submission_with_valid_data(): void
    {
        $validData = [
            'name' => 'liaat',
            'user_name' => 'btas',
            'birthdate' => '1990-01-01',
            'phone' => '01234544890',
            'address' => '123 Street, City',
            'password' => 'Password123!',
            'confirm_password' => 'Password123!',
            'email' => 'test@example.com',
        ];

        $response = $this->post(route('checkErrors'), $validData);

        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Form submitted successfully!');
    }


}
