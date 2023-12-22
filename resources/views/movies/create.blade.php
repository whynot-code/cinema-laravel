@extends('layouts.admin')

@section('page_content')
    <form action="{{ route('movies_store') }}" method="POST">
        @csrf

        <label>
            <p>Kategoria:</p>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </label>

        <label>
            <p>Tytuł:</p>
            <input type="text" name="title" value="{{ old('title') }}">
            @error('title') 
                <p style="color: red; position: absolute;">{{ $errors->first('title') }}</p>
            @enderror
        </label>

        <label>
            <p>Autor:</p>
            <input type="text" name="author" value="{{ old('author') }}">
            @error('author') 
                <p style="color: red; position: absolute;">{{ $errors->first('author') }}</p>
            @enderror
        </label>

        <label>
            <p>Opis:</p>
            <input type="text" name="description" value="{{ old('description') }}">
            @error('description') 
                <p style="color: red; position: absolute;">{{ $errors->first('description') }}</p>
            @enderror
        </label>

        <label>
            <p>Zwiastun:</p>
            <input type="text" name="trailer_link" value="{{ old('trailer_link') }}">
            @error('trailer_link') 
                <p style="color: red; position: absolute;">{{ $errors->first('trailer_link') }}</p>
            @enderror
        </label>
        
        <label>
            <p>Data Produkcji:</p>
            <input type="date" name="production_date">
        </label>

        <label>
            <p>Data Wyświetlenia:</p>
            <input type="date" name="release_date">
        </label>

        <label>
            <p>Obraz:</p>
            <input type="text" name="main_image" value="{{ old('main_image') }}">
            @error('main_image') 
                <p style="color: red; position: absolute;">{{ $errors->first('main_image') }}</p>
            @enderror
        </label>
        
        <button type='submit'>Dodaj film</button>
    </form>
@endsection