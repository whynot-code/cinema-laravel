@extends('layouts.admin')

@section('page_content')
    <form action="{{ route('rooms_store')}}" method="POST">
        @csrf

        <label>
            <p>Nazwa:</p>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') 
                <p style="color: red; position: absolute; font-size: 12px;">{{ $errors->first('name') }}</p>
            @enderror
        </label>
        <label>
            <p>Numer sali:</p>
            <input type="text" name="number" value="{{ old('number') }}">
            @error('number') 
                <p style="color: red; position: absolute; font-size: 12px;">{{ $errors->first('number') }}</p>
            @enderror
        </label>
        <label>
            <p>Liczba miejsc:</p>
            <input type="text" name="seats_number" value="{{ old('seats_number') }}">
            @error('seats_number') 
                <p style="color: red; position: absolute; font-size: 12px;">{{ $errors->first('seats_number') }}</p>
            @enderror
        </label>
        <button type="submit">Dodaj salę</button>
    </form>
@endsection