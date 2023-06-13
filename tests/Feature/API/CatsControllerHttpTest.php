<?php

declare(strict_types=1);

namespace Tests\Feature\API;

use App\Models\Cat;
use App\Models\Shelter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatsControllerHttpTest extends TestCase
{
    use RefreshDatabase;

    private Shelter $shelter;

    protected function setUp(): void
    {
        parent::setUp();
        Cat::factory()->count(10)->create();
        $this->shelter = Shelter::factory()->create();
    }

    public function test_get_all_cats()
    {
        $response = $this->get('/api/cats');

        $response->assertStatus(200);
        $response->assertJson(Cat::all()->toArray());
    }

    public function test_get_single_cat()
    {
        $cat = Cat::factory()->create();

        $response = $this->get("/api/cats/{$cat->id}");

        $response->assertStatus(200);
        $response->assertJson($cat->toArray());
    }

    public function test_create_cat()
    {
        $data = [
            'name' => 'New Cat',
            'breed' => 'New Breed',
            'birth_date' => '2022-01-01',
            'is_vaccinated' => true,
            'is_adoption_available' => true,
            'shelter_id' => $this->shelter->id,
        ];

        $response = $this->post('/api/cats', $data);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Cat created successfully']);
        $this->assertDatabaseHas('cats', $data);
    }

    public function test_update_cat()
    {
        $cat = Cat::factory()->create();
        $data = [
            'name' => 'Updated Cat',
            'breed' => 'Updated Breed',
            'birth_date' => '2020-05-01',
            'is_vaccinated' => false,
            'is_adoption_available' => false,
            'shelter_id' => $this->shelter->id,
        ];

        $response = $this->patch("/api/cats/{$cat->id}", $data);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Cat updated successfully']);
        $this->assertDatabaseHas('cats', $data);
    }

    public function test_delete_cat()
    {
        $cat = Cat::factory()->create();

        $response = $this->delete("/api/cats/{$cat->id}");

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Cat deleted successfully']);
        $this->assertDatabaseMissing('cats', ['id' => $cat->id]);
    }
}
