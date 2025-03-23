@extends('layouts.app')

@section('title', 'User List')

@section('content')
<div class="container">
    <h1>User List</h1>

    <!-- Form Filter & Search -->
    <form method="GET" action="{{ route('users.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search by name or email"
                       value="{{ request()->search }}">
            </div>
            <div class="col-md-4">
                <select name="verified" class="form-control">
                    <option value="all" {{ request()->verified == 'all' ? 'selected' : '' }}>All</option>
                    <option value="verified" {{ request()->verified == 'verified' ? 'selected' : '' }}>Verified</option>
                    <option value="unverified" {{ request()->verified == 'unverified' ? 'selected' : '' }}>Unverified</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <!-- Tabel User -->
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Email Verified</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->email_verified_at ? 'Verified' : 'Not Verified' }}</td>
        </tr>
        @endforeach
    </table>
</div>

    <!-- Pagination -->
    {{ $users->links() }}
@endsection
