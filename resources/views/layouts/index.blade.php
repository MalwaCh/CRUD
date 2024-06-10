@extends('dashboard')

@section('dashboard-content')
    <h2>List of News</h2>
    <ul class="list-group">
        @foreach($news as $article)
            <li class="list-group-item">
                <h4>{{ $article->title }}</h4>
                <p>{{ $article->content }}</p>
                <p>Author: {{ $article->author }}</p>
                <p>Published At: {{ $article->published_at }}</p>
                <a href="{{ route('news.edit', $article->id) }}" class="btn btn-success btn-sm">Edit</a>
                <form action="{{ route('news.destroy', $article->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
