<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laman Berita Terkini</title>
</head>
<body>
    <h1>Welcome to Our Laman Berita Terkini</h1>

    <a href="{{ route('news.create') }}">Add News</a>

    <h2>List of News</h2>
    <ul>
        @foreach($news as $article)
            <li>
                <h3>{{ $article->title }}</h3>
                <p>{{ $article->content }}</p>
                <p>Author: {{ $article->author }}</p>
                <p>Published At: {{ $article->published_at }}</p>
                <a href="{{ route('news.edit', $article->id) }}">Edit</a>
                <form action="{{ route('news.destroy', $article->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
