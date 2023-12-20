<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        $categories = Category::all();

        return CategoryResource::collection($categories);
        // return response()->json($categories);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): CategoryResource
    {
        $category = Category::find($id);

        return CategoryResource::make($category);
        // return response()->json($category);
    }
}
