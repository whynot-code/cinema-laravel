@extends('layouts.admin')



@section('page_content')

    <form action="{{ route('rooms_update', ['id' => $room]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>
            <p>Nazwa:</p>
            <input type="text" name="name" value="{{ $room->name }}">
            @error('name') 
                <p style="color: red; position: absolute; font-size: 12px;">{{ $errors->first('name') }}</p>
            @enderror
        </label>

        <label>
            <p>Numer sali:</p>
            <input type="text" name="number" value="{{ $room->number }}">
            @error('number') 
                <p style="color: red; position: absolute; font-size: 12px;">{{ $errors->first('number') }}</p>
            @enderror
        </label>

        <label>
            <p>Ilość miejsc:</p>
            <input type="text" name="seats_number" value="{{ $room->seats_number }}">
            @error('seats_number') 
                <p style="color: red; position: absolute; font-size: 12px;">{{ $errors->first('seats_number') }}</p>
            @enderror
        </label>

        <button type='submit'>Edytuj film</button>
    </form>
@endsection