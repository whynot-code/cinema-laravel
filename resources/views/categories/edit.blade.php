@extends('layouts.admin')

@section('page_content')
    <form action="{{ route('categories_update', ['id' => $category->id]) }}" method="POST">
        @csrf
        @method('PUT')
    
        <input type="text" name="name" value="{{ $category->name }}">
        <button type="submit">Edytuj</button>
    </form>
@endsection
