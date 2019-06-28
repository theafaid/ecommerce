<?php
namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function __call($name, $arguments)
    {
        return $this->category->$name(...$arguments);
    }

    public function parents(){
        return Category::with('children')->parents()->get();
    }
}
