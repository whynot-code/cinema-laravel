@extends('layouts.admin')

@section('page_content')
    <a href="{{ route('movies_create') }}">Dodaj Film</a>

    <table style="width: 100%;">
        <thead>
            <th>ID</th>
            <th>Category</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Trailer link</th>
            <th>Production Date</th>
            <th>Release Date</th>
            <th>Image</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->category->name }}</td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->author }}</td>
                    <td>{{ $movie->description }}</td>
                    <td>{{ $movie->trailer_link }}</td>
                    <td>{{ $movie->production_date }}</td>
                    <td>{{ $movie->release_date }}</td>
                    <td>{{ $movie->main_image }}</td>
                    <td>
                        <a href="{{ route('movies_edit', ['id' => $movie->id]) }}">Edytuj</a>
                        <form action="{{ route('movies_destroy', ['id' => $movie->id]) }}" method="POST">
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