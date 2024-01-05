@extends('layouts.admin')

@section('page_content')
    <a href="{{ route('reservations_create') }}">Nowa Rezerwacja</a>
    <table style="width: 100%">
        <thead>
            <th>ID</th>
            <th>Użytkownik</th>
            <th>Repertuar</th>
            <th>Miejsca</th>
            <th>Akcja</th>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->uuid }}</td>
                    <td>
                        {{ $reservation->user->name }}
                    </td>
                    <td>
                        {{ $reservation->repertoire->movie->title }} | 
                        {{ $reservation->repertoire->display_date }} | 
                        {{ $reservation->repertoire->display_time }}    
                    </td>
                    <td>{{ $reservation->seats_number }}</td>
                    <td>
                        <a href="{{ route('reservations_edit', ['id' => $reservation->uuid ]) }}">Edytuj repertuar</a>
                        <form action="{{ route('reservations_destroy', ['id' => $reservation->uuid]) }}" method="POST">
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