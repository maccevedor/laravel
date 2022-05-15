<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_index()
    {
        $product = Product::factory()->count(5)->create();

        $response = $this->json('GET', '/api/products');

        $response
            ->assertSuccessful()
            ->assertHeader('content-type', 'application/json')
            ->assertJsonCount(5);
    }
}
