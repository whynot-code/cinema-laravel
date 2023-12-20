@extends('layouts.admin')

@section('page_content')
    <form action="{{ route('categories_store') }}" method="POST">
        @csrf
    
        <input type="text" name="name" >
        <button type="submit">Dodaj</button>
    </form>
@endsection
