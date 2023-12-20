@extends('layouts.admin')

@section('page_content')
    <a href="{{ route('categories_create') }}">Dodaj Kategorie</a>

    <table style="width: 100%;">
        <thead>
            <th>Id</th>
            <th>Nazwa</th>
            <th>Akcje</th>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories_edit', ['id' => $category->id]) }}">Edytuj</a>
                        <form action="{{ route('categories_destroy', ['id' => $category->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- @foreach ($categories as $category)
        <p>
            This is category {{ $category->name }} 
            (<a href="{{ route('categories_edit', ['id' => $category->id]) }}">{{ $category->id }}</a>)
        </p>
    @endforeach --}}
@endsection

