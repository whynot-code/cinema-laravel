<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieStoreRequest;
use App\Http\Requests\MovieUpdateRequest;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('movies.index', [
            'movies' => Movie::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('movies.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieStoreRequest $request): RedirectResponse
    {
        $movie = new Movie();

        $movie->title = $request->input('title');
        $movie->category_id = $request->input('category_id');
        $movie->author = $request->input('author');
        $movie->description = $request->input('description');
        $movie->trailer_link = $request->input('trailer_link');
        $movie->production_date = $request->input('production_date');
        $movie->release_date = $request->input('release_date');
        $movie->main_image = $request->input('main_image');

        // Other way to associate realtionship
        // $categoryId = $request->input('category_id');
        // $category = Category::find($categoryId);

        // $movie->category()->associate($category);

        $movie->save();

        return redirect()->route('movies_index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $movie = Movie::findOrFail($id);
        $categories = Category::all();

        return view('movies.edit', [
            'movie' => $movie,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieUpdateRequest $request, string $id): RedirectResponse
    {
        $movie = Movie::findOrFail($id);

        $movie->title = $request->input('title');
        $movie->category_id = $request->input('category_id');
        $movie->author = $request->input('author');
        $movie->description = $request->input('description');
        $movie->trailer_link = $request->input('trailer_link');
        $movie->production_date = $request->input('production_date');
        $movie->release_date = $request->input('release_date');
        $movie->main_image = $request->input('main_image');

        $movie->save();

        return redirect()->route('movies_index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $movie = Movie::findOrFail($id);

        $movie->delete();

        return redirect()->route('movies_index');
    }
}
