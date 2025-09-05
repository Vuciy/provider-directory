<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Provider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProviderModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_provider_belongs_to_category()
    {
        $category = Category::factory()->create();
        $provider = Provider::factory()->create(['category_id' => $category->id]);

        $this->assertEquals($category->id, $provider->category->id);
    }
}