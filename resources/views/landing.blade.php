@extends('layouts.app')

@section('title', 'Landing Page')

@section('content')
    <div class="d-flex bg-primary  justify-content-center align-items-center"  style="height: 60vh">
        <div>
            <h1 class=" mb-4 text-light">Selamat Datang diaplikasi BCRUD</h1>
            <p class="text-sm text-white">Lorem ipsum dolor sit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla.</p>
            <a class="btn btn-success  text-sm " href="{{ route('login') }}">Silahkan Klik Disini Untuk Masuk</a>
        </div>
    </div>

    <!-- Filter -->
    <div class="container">
    <div class="my-5">
        <h2 class="text-center my-4 ">Daftar Buku</h2>
        <form method="GET" action="{{ route('landing') }}" class="mb-4 mt-4">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="author" class="form-control" placeholder="Filter by Author"
                        value="{{ request()->author }}">
                </div>
                <div class="col-md-3">
                    <input type="date" name="date_uploaded" class="form-control" 
                    value="{{ request()->date_uploaded }}">
                </div>
                <div class="col-md-3">
                    <select name="rating" class="form-control">
                        <option value="">Filter by Rating</option>
                        <option value="1" {{ request()->rating == '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ request()->rating == '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ request()->rating == '3' ? 'selected' : '' }}>3</option>
                        <option value="4" {{ request()->rating == '4' ? 'selected' : '' }}>4</option>
                        <option value="5" {{ request()->rating == '5' ? 'selected' : '' }}>5</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <!-- Tabel Buku -->
        <table class="table table-striped table-bordered">
            <tr>
                <th class="bg-success text-white">Title</th>
                <th class="bg-success text-white">Author</th>
                <th class="bg-success text-white">Description</th>
                <th class="bg-success text-white">Rating</th>
                <th class="bg-success text-white">Date Uploaded</th>
            </tr>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->description }}</td>
                <td>{{ $book->rating }}</td>
                <td>{{ $book->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </table>
        <!-- Pagination -->
        {{ $books->links() }}
    </div>
    </div>

@endsection
