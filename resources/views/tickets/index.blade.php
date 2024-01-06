@extends('layouts.admin')

@section('page_content')
    <a href="{{ route('tickets_create') }}">Nowy Bilet</a>
    <table style="width: 100%">
        <thead>
            <th>ID</th>
            <th>Użytkownik</th>
            <th>Repertuar</th>
            <th>Miejsca</th>
            <th>Akcja</th>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->uuid }}</td>
                    <td>
                        {{ $ticket->user->name }}
                    </td>
                    <td>
                        {{ $ticket->repertoire->movie->title }} | 
                        {{ $ticket->repertoire->display_date }} | 
                        {{ $ticket->repertoire->display_time }}    
                    </td>
                    <td>{{ $ticket->seats_number }}</td>
                    <td>
                        <a href="{{ route('tickets_edit', ['id' => $ticket->uuid ]) }}">Edytuj repertuar</a>
                        <form action="{{ route('tickets_destroy', ['id' => $ticket->uuid]) }}" method="POST">
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