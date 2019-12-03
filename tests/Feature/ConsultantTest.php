<?php

namespace Tests\Feature;

use App\Consultant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConsultantTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testsConsultantsAreCreatedCorrectly()
    {
        $payload = [
            'name' => 'Lorem',
            'email' => 'Ipsum@gmail.com',
        ];

        $this->json('POST', '/api/consultants', $payload)
            ->assertStatus(201)
            ->assertJson(['id' => 11, 'name' => 'Lorem', 'email' => 'Ipsum@gmail.com']);
    }

    public function testConsultantsAreListedCorrectly()
    {
        factory(Consultant::class)
            ->create([
            'name' => 'hmapus',
            'email' => 'hampus@cy.se'
        ])
            ->create([
            'name' => 'wang',
            'email' => 'wwab@cy.se'
        ]);

        $response = $this->json('GET', '/api/consultants', [])
        ->assertStatus(200)
        ->assertJsonCount(12)
        ->assertJsonStructure([
            '*' => ['id', 'name', 'email', 'created_at', 'updated_at'],
        ]);

        $response = $this->json('GET', '/api/consultants/11', [])
            ->assertStatus(200)
            ->assertJson([
                'name' => 'hmapus',
                'email' => 'hampus@cy.se'
            ]);
    }

    public function testsConsultantsAreUpdatedCorrectly()
    {
        $consultant = factory(Consultant::class)->create([
            'name' => 'hmapus',
            'email' => 'hampus@cy.se'
        ]);

        $payload = [
            'name' => 'wabg',
            'email' => 'wang@cy.se'
        ];

        $response = $this->json('PUT', '/api/consultants', $consultant->id, $payload)
            ->assertStatus(200)
            ->assertJson([
                'id' => 1,
                'name' => 'wabg',
                'email' => 'wang@cy.se'
            ]);
    }
}
