@extends('layouts.app')

@section('title', 'Book List')

@section('content')
<div class="container mt-4">
    <h1>Book List</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary my-4">Tambah</a>
    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Rating</th>
            <th>Actions</th>
        </tr>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->rating }}</td>
            <td>
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection