@extends('layouts.admin')

@section('page_content')
    <form action="{{ route('repertoires_store') }}" method="POST">
        @csrf
        
        <label>
            <p>Sala</p>
            <select class=" px-4 py-1 " name="room_id">
            @foreach ($rooms as $room)
                <option value="{{ $room->id }}">
                    {{ $room->number }}. {{ $room->name }}
                </option>
            @endforeach
            </select>
            @error('room_id') 
                <p class=" absolute text-xs text-red-600">{{ $errors->first('room_id') }}</p>
            @enderror
        </label>
        <label>
            <p>Film</p>
            <select class=" px-4 py-1 " name="movie_id">
            @foreach ($movies as $movie)
                <option value="{{ $movie->id }}">{{ $movie->title }}</option>
            @endforeach
            </select>
            @error('movie_id') 
                <p class=" absolute text-xs text-red-600">{{ $errors->first('movie_id') }}</p>
            @enderror
        </label class=" mr-5 ">
        <label>
            <p>Data Wyświetlenia</p>
            <input class=" px-4 " type="date" name="display_date">
            @error('display_date') 
                <p class=" absolute text-xs text-red-600">{{ $errors->first('display_date') }}</p>
            @enderror
        </label>
        <label class=" mr-5 ">
            <p>Godzina Wyświetlenia</p>
            <input class=" px-4 " type="time" name="display_time">
            @error('display_time') 
                <p class=" absolute text-xs text-red-600">{{ $errors->first('display_time') }}</p>
            @enderror
        </label>
        <button type="submit">Dodaj repertuar</button>
    </form>
@endsection