@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')
<div class="container mt-4">

    <h1>Edit Book</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $book->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating (1-5)</label>
            <select class="form-control" id="rating" name="rating" required>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ $book->rating == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail</label> <br>
            @if ($book->thumbnail)
                <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="Book Thumbnail" class="shadow my-2" width="400">
            @endif
            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
        </div>

        <button type="submit" class="btn btn-primary">Update Book</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
