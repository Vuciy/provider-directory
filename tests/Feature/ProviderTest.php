<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Provider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProviderTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_page_loads_with_providers()
    {
        $this->seed();

        $response = $this->get('/providers');
        $response->assertStatus(200);
        $response->assertSee('providers');
        $this->assertEquals(100, Provider::count());
    }

    public function test_filter_by_category()
    {
        $this->seed();
        $category = Category::first();

        $response = $this->get('/providers?category=' . $category->id);
        $response->assertStatus(200);
    }

    public function test_show_page()
    {
        $this->seed();
        $provider = Provider::first();

        $response = $this->get('/providers/' . $provider->id);
        $response->assertStatus(200);
        $response->assertSee($provider->name);
    }
}
