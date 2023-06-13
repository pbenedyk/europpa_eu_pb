<?php

declare(strict_types=1);

namespace Tests\Feature\API;

use App\Models\Shelter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SheltersControllerHttpTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Shelter::factory()->count(10)->create();
    }

    public function test_get_all_shelters()
    {
        $shelters = Shelter::all();

        $response = $this->get('/api/shelters');

        $response->assertStatus(200);
        $response->assertJson($shelters->toArray());
    }

    public function test_get_single_shelter()
    {
        $shelter = Shelter::factory()->create();

        $response = $this->get("/api/shelters/{$shelter->id}");

        $response->assertStatus(200);
        $response->assertJson($shelter->toArray());
    }

    public function test_create_shelter()
    {
        $data = [
            'name' => 'New Shelter',
            'city' => 'New City',
            'street' => 'New Street',
            'house_number' => '456',
            'zip' => '67890',
            'phone' => '9876543210',
            'email' => 'new@example.com',
        ];

        $response = $this->post('/api/shelters', $data);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Shelter created successfully']);
        $this->assertDatabaseHas('shelters', $data);
    }

    public function test_update_shelter()
    {
        $shelter = Shelter::factory()->create();

        $data = [
            'name' => 'Updated Shelter',
            'city' => 'Updated City',
            'street' => 'Updated Street',
            'house_number' => '789',
            'zip' => '54321',
            'phone' => '9876543210',
            'email' => 'updated@example.com',
        ];

        $response = $this->patch("/api/shelters/{$shelter->id}", $data);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Shelter updated successfully']);
        $this->assertDatabaseHas('shelters', $data);
    }

    public function test_delete_shelter()
    {
        $shelter = Shelter::factory()->create();

        $response = $this->delete("/api/shelters/{$shelter->id}");

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Shelter deleted successfully']);
        $this->assertDatabaseMissing('shelters', ['id' => $shelter->id]);
    }
}
