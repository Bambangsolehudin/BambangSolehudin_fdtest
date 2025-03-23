@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mt-4">
    <h1>Welcome, {{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>
    <p class="">Status: <span class="btn btn-outline-success">  {{ $user->email_verified_at ? 'Verified' : 'Not Verified' }}</span> </p>
    <a href="{{ route('books.index') }}" class="btn btn-primary">Books</a>
    <a href="{{ route('users.index') }}" class="btn btn-warning">Users</a>
</div>
@endsection
