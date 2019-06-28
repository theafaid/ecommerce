<?php

namespace App\Http\Controllers;

use App\Services\Categories\CategoryIndexService;

class CategoriesController extends Controller
{
    public function __invoke()
    {
        return response(
            app(CategoryIndexService::class)->handle(),
            200
        );
    }
}
