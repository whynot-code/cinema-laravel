@extends('layouts.admin')

@section('page_content')
    <form action="{{ route('categories_update', ['id' => $category->id]) }}" method="POST">
        @csrf
        @method('PUT')
    
        <input type="text" name="name" value="{{ $category->name }}">
        @error('name') 
            <p style="color: red; position: absolute;">{{ $errors->first('name') }}</p>
        @enderror
        <button type="submit">Edytuj</button>
    </form>
@endsection
