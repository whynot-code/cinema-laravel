@extends('layouts.admin')

@section('page_content')
    <form action="{{ route('categories_store') }}" method="POST">
        @csrf
    
        <input type="text" name="name" >
        @error('name') 
            <p style="color: red; position: absolute;">{{ $errors->first('name') }}</p>
        @enderror
        <button type="submit">Dodaj</button>
    </form>
@endsection
