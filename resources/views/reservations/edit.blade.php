@extends('layouts.admin')

@section('page_content')    
    <form action="{{ route('reservations_update', ['id' => $reservation->uuid]) }}" method="POST">
        @csrf
        @method('PUT')
        <label>
            <p>ID</p>
                    <input name="uuid" type="text" value="{{ $reservation->uuid }}">
            @error('uuid') 
                <p style="color: red; position: absolute; font-size: 10px;">{{ $errors->first('uuid') }}</p>
            @enderror
        </label>
        <label>
            <p>Użytkownik</p>
            <select name="user_id">
                @foreach ($users as $user)
                    <option 
                        value="{{ $reservation->user_id }}"
                        @if ($reservation->user_id === $user->id)
                        selected
                        @endif
                    >
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id') 
                <p style="color: red; position: absolute; font-size: 10px;">{{ $errors->first('user_id') }}</p>
            @enderror
        </label>
        <label>
            <p>Repertuar</p>
            <select name="repertoire_id">
                @foreach ($repertoires as $repertoire)
                    <option 
                    value="{{ $repertoire->id }}"
                    @if ($reservation->repertoire_id === $repertoire->id)
                        selected
                    @endif
                    >
                        {{ $repertoire->movie->title }} | 
                        {{ $repertoire->display_date }} | 
                        {{ $repertoire->display_time }}
                    </option>
                @endforeach
            </select>
            @error('repertoire_id') 
                <p style="color: red; position: absolute; font-size: 10px;">{{ $errors->first('repertoire_id') }}</p>
            @enderror
        </label>
        <label>
            <p>Miejsca</p>
            <select class="text-red-400" name="seats_number">
                @for ($i = 1; $i < 30; $i++)
                <option 
                    value="{{ $i }}"
                    @if ($i === $reservation->seats_number)
                        selected
                    @endif
                    >
                    {{ $i }}
                </option>
                @endfor
            </select>
            @error('seats_number') 
                <p style="color: red; position: absolute; font-size: 10px;">{{ $errors->first('seats_number') }}</p>
            @enderror
        </label>
        <button type="submit">Edytuj</button>
    </form>
@endsection