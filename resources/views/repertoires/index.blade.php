@extends('layouts.admin')

@section('page_content')
    <a href={{ route('repertoires_create') }}>Dodaj repertuar</a>
    <table style="width: 100%">
        <thead>
            <th>Sala</th>
            <th>Film</th>
            <th>Data/czas wyświetlenia</th>
        </thead>
        @foreach ($repertoires as $repertoire)
            <tbody>
                    <td>{{ $repertoire->room->number }}. {{ $repertoire->room->name }}</td>
                    <td>{{ $repertoire->movie->title }}</td>
                    <td>{{ $repertoire->display_datetime }}</td>
                    <td>
                        <a href="{{ route('repertoires_edit', ['id' => $repertoire->id]) }}">Edytuj</a>
                        <form action="{{ route('repertoires_destroy', ['id' => $repertoire->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Usuń</button>
                        </form>
                    </td>
            </tbody>
        @endforeach
    </table>
@endsection