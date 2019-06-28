<?php
namespace App\Services\Categories;

use App\Repositories\CategoryRepository;
use App\Http\Resources\Categories\CategoryResource;

class CategoryIndexService
{
    private $categories;

    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    public function handle()
    {
        return CategoryResource::collection($this->categories->parents());
    }
}
