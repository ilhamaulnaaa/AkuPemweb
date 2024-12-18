@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="text-center">Available Books</h2>
    <form method="GET" action="{{ route('user.search') }}">
        <input type="text" name="query" placeholder="Search by title or category" class="form-control mb-3">
    </form>
    <div class="row">
        @foreach($books as $book)
        <div class="col-md-3">
            <div class="card mb-4">
                @if($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top" alt="{{ $book->name }}">
                @else
                <img src="{{ asset('images/default-cover.jpg') }}" class="card-img-top" alt="Default Cover">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $book->name }}</h5>
                    <p class="card-text">Author: {{ $book->auther->name }}</p>
                    <p class="card-text">Category: {{ $book->category->name }}</p>
                    <form action="{{ route('user.borrow', $book) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Borrow</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection