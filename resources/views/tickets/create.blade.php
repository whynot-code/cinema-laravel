@extends('layouts.admin')

@section('page_content')
    <table style="width: 100%">
        <thead>
            <th>ID</th>
            <th>Użytkownik</th>
            <th>Repertuar</th>
            <th>Miejsce</th>
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
                    <form action="{{ route('tickets_store', ['uuid' => $reservation->uuid]) }}" method="POST">
                        @csrf
                        <button type="submit">Utwórz Bilet</button>
                    </form>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
@endsection