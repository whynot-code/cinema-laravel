@extends('layouts.admin')

@section('page_content')
@section('page_title', 'Repertuar')

    <a href={{ route('repertoires_create') }}>Dodaj repertuar</a>
        @foreach ($sorted_dates as $date)
            <h3 class=" text-center bg-slate-400 text-lg font-bold">{{ $date }}</h3>
            @foreach ($rooms as $room)
                <h4 class=" text-center bg-slate-300 text-lg p-1 ">
                    Sala: {{ $room->number }}. 
                    ({{ $room->name }})
                </h4>
                <table class=" w-full mb-5 border-b-2 border-solid">
                    <thead>
                        <th class="w-1/4">Film</th>
                        <th class="w-1/4">Godzina</th>
                        <th class="w-1/4">Wolne miejsca</th>
                        <th class="w-1/4">Akcja</th>
                    </thead>
                    @foreach ($repertoires as $repertoire)
                        @if ($repertoire->display_date === $date && $repertoire->room_id === $room->number)
                            <tbody class=" bg-slate-200 p-4 ">
                                <td>{{ $repertoire->movie->title }}</td>
                                <td>{{ $repertoire->display_time }}</td>
                                <td>{{ count(json_decode($repertoire->available_seats, true)) }}</td>
                                <td class=" font-bold ">
                                    <a class="hover:underline" href="{{ route('repertoires_edit', ['id' => $repertoire->id]) }}">Edytuj</a>
                                    <form 
                                        class=" ml-3 inline-block" 
                                        action="{{ route('repertoires_destroy', ['id' => $repertoire->id]) }}" 
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="hover:underline" type="submit">Usuń</button>
                                    </form>
                                </td>
                            </tbody>
                        @endif
                    @endforeach
                </table>
            @endforeach  
        @endforeach
@endsection