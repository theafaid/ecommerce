<?php

namespace Tests\Unit\Models;

use Illuminate\Support\Collection;
use App\Models\Category;
use Tests\TestCase;

class CategoryTest extends TestCase

{
    /** @test */
    function it_has_many_children()
    {
        $category = create(Category::class);

        $category->children()->save(create(Category::class));

        $this->assertInstanceOf(Collection::class, $category->children);
        $this->assertInstanceOf(Category::class, $category->children->first());
    }

    /** @test */
    function it_belongs_to_parent()
    {
        $category = create(Category::class);

        $child = $category->children()->save(create(Category::class));

        $this->assertEquals($category->id, $child->parent->id);
    }

    /** @test */
    function can_fetch_parents_only()
    {
        $parents  = create(Category::class, ['parent_id' => null], 3);
        $children = create(Category::class, ['parent_id' => $parents->random()->id], 3);

        $this->assertTrue(Category::parents()->pluck('id')->contains($parents->random()->id));
        $this->assertFalse(Category::parents()->pluck('id')->contains($children->random()->id));
    }
}

