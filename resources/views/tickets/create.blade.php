@extends('layouts.admin')

@section('page_content')
    <form action="{{ route('tickets_store') }}" method="POST">
        @csrf
        <label>
            <p>ID</p>
            <input name="uuid" type="text">
        </label>
        @error('uuid') 
                <p style="color: red; position: absolute; font-size: 10px;">{{ $errors->first('uuid') }}</p>
        @enderror
        <label>
            <p>Użytkownik</p>
            <select name="user_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}: {{ $user->email }}</option>
                @endforeach
            </select>
        </label>
            @error('user_id') 
                <p style="color: red; position: absolute; font-size: 10px;">{{ $errors->first('user_id') }}</p>
            @enderror
        <label>
            <p>Repertuar</p>
            <select name="repertoire_id">
                @foreach ($repertoires as $repertoire)
                    <option value="{{ $repertoire->id }}">
                        {{ $repertoire->movie->title }} | 
                        {{ $repertoire->display_date }} | 
                        {{ $repertoire->display_time }}
                    </option>
                @endforeach
            </select>
        </label>
        @error('repertoire_id') 
            <p style="color: red; position: absolute; font-size: 10px;">{{ $errors->first('repertoire_id') }}</p>
        @enderror
        <label>
            <p>Miejsce</p>
            <select class="text-red-400" name="seats_number">
                @for ($i = 1; $i < 30; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </label>
        @error('seats_number') 
                <p style="color: red; position: absolute; font-size: 10px;">{{ $errors->first('seats_number') }}</p>
        @enderror
        <button  type="submit">Dodaj bilet(disabled)</button>
    </form>
@endsection