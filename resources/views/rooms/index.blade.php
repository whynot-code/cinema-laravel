@extends('layouts.admin')

@section('page_content')
    <a href="{{ route('rooms_create') }}">Nowa Sala</a>
    <table style="width: 100%">
        <thead>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Numer sali</th>
            <th>Ilość miejsc</th>
            <th>Akcja</th>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->number }}</td>
                    <td>{{ $room->seats_number }}</td>
                    <td>
                        <a href="{{ route('rooms_edit', ['id' => $room->id ]) }}">Edytuj salę</a>
                        <form action="{{ route('rooms_destroy', ['id' => $room->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Usuń</button>
                        </form>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
@endsection