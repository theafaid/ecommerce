<?php

namespace Tests\Feature\Categories;

use App\Models\Category;
use Tests\TestCase;

class CategoryIndexTest extends TestCase
{
    /** @test */
    function it_returns_a_collection_of_categories()
    {
        $categories = create(Category::class, [], 4);

        $response = $this->json('GET', route('categories.index'));

        $categories->each(function ($category) use ($response) {
            $response->assertJsonFragment(
              ['slug' => $category->slug]
            );
        });


        $response->assertJsonCount(4, '');
        $response->assertStatus(200);
    }
}
