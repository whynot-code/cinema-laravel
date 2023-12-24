@extends('layouts.admin')

@section('page_content')    
    <form action="{{ route('repertoires_update', ['id' => $repertoire->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label>
            <p>Sala</p>
            <select name="room_id">
                @foreach ($rooms as $room)
                    <option 
                        value="{{ $room->id }}"
                        @if ($repertoire->room_id === $room->id)
                        selected
                        @endif
                        >
                        {{ $room->number }}. {{ $room->name }}</option>
                @endforeach
            </select>
            @error('room_id') 
                <p style="color: red; position: absolute; font-size: 10px;">{{ $errors->first('room_id') }}</p>
            @enderror
        </label>
        <label>
            <p>Film</p>
            <select name="movie_id">
                @foreach ($movies as $movie)
                    <option 
                        value="{{ $movie->id }}"
                        @if ($repertoire->movie_id === $movie->id)
                        selected
                        @endif
                    >
                        {{ $movie->title }}</option>
                @endforeach
            </select>
            @error('movie_id') 
                <p style="color: red; position: absolute; font-size: 10px;">{{ $errors->first('movie_id') }}</p>
            @enderror
        </label>
        <label>
            <p>Data/Czas wyświetlenia</p>
            <input type="datetime-local" name="display_datetime" value="{{ $repertoire->display_datetime }}">
            @error('display_datetime') 
                <p style="color: red; position: absolute; font-size: 10px;">{{ $errors->first('display_datetime') }}</p>
            @enderror
        </label>
        <button type="submit">Edytuj</button>
    </form>
@endsection