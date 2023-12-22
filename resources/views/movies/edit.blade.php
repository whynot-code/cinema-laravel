@extends('layouts.admin')



@section('page_content')

    <form action="{{ route('movies_update', ['id' => $movie]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>
            <p>Kategoria:</p>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option 
                        value="{{ $category->id }}"
                        @if ($movie->category->id === $category->id)
                         selected   
                        @endif
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

        </label>

        <label>
            <p>Tytuł:</p>
            <input type="text" name="title" value="{{ $movie->title }}">
            @error('title') 
                <p style="color: red; position: absolute;">{{ $errors->first('title') }}</p>
            @enderror
        </label>

        <label>
            <p>Autor:</p>
            <input type="text" name="author" value="{{ $movie->author }}">
            @error('author') 
                <p style="color: red; position: absolute;">{{ $errors->first('author') }}</p>
            @enderror
        </label>

        <label>
            <p>Opis:</p>
            <input type="text" name="description" value="{{ $movie->description }}">
            @error('description') 
                <p style="color: red; position: absolute;">{{ $errors->first('description') }}</p>
            @enderror
        </label>

        <label>
            <p>Zwiastun:</p>
            <input type="text" name="trailer_link" value="{{ $movie->trailer_link }}">
            @error('trailer_link') 
                <p style="color: red; position: absolute;">{{ $errors->first('trailer_link') }}</p>
            @enderror
        </label>
        
        <label>
            <p>Data Produkcji:</p>
            <input type="date" name="production_date" value="{{ $movie->production_date }}">
        </label>

        <label>
            <p>Data Wyświetlenia:</p>
            <input type="date" name="release_date" value="{{ $movie->release_date }}">
        </label>

        <label>
            <p>Obraz:</p>
            <input type="text" name="main_image" value="{{ $movie->main_image }}">
            @error('main_image') 
                <p style="color: red; position: absolute;">{{ $errors->first('main_image') }}</p>
            @enderror
        </label>
        
        <button type='submit'>Edytuj film</button>
    </form>
@endsection