@extends('dashboard')

@section('dashboard-content')
    <h2>Add News</h2>
    <form action="{{ route('news.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author">
        </div>
        <div class="mb-3">
            <label for="published_at" class="form-label">Published At</label>
            <input type="date" class="form-control" id="published_at" name="published_at">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
