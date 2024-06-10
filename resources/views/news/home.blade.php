<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laman Berita Terkini</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .bg-pink {
            background-color: pink;
        }
        .btn-pink {
            background-color: pink;
            color: white;
        }
        .btn-pink:hover {
            background-color: deeppink;
            color: white;
        }
    </style>
</head>

<body>
    <div class="bg-pink py-3">
        <h3 class="text-white text-center">Laman Berita Terkini </h3>
    </div>

    <div class="container">
        <div class="justify-content-center row mt-4">
            <div class="d-flex col-md-10 justify-content-end">
                <a href="{{ route('news.create') }}" class="btn-pink btn">Add News</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if(Session::has('success'))
            <div class="col-md-10 mt-4">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
            @endif
            <div class="col-md-10">
                <div class="card border-0 shadow-lg mt-5 mb-5">
                    <div class="card-header bg-pink">
                        <h3 class="text-white">List of News</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($news as $article)
                            <li class="list-group-item">
                                <h3>{{ $article->title }}</h3>
                                <p>{{ $article->content }}</p>
                                <p>Author: {{ $article->author }}</p>
                                <p>Published At: {{ $article->published_at }}</p>
                                <a href="{{ route('news.edit', $article->id) }}" class="btn-pink btn">Edit</a>
                                <form action="{{ route('news.destroy', $article->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger btn">Delete</button>
                                </form>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
