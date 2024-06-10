<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laman Berita Terkini - Add News</title>
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
        <h3 class="text-white text-center">Laman Berita Terkini - Add News</h3>
    </div>

    <div class="container">
        <div class="justify-content-center row mt-4">
            <div class="d-flex col-md-10 justify-content-start">
                <a href="{{ route('news.index') }}" class="btn-pink btn">Back to News List</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow-lg mt-5 mb-5">
                    <div class="card-header bg-pink">
                        <h3 class="text-white">Add News</h3>
                    </div>
                    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label h4" for="title">Title</label>
                                <input type="text" value="{{ old('title') }}" class="form-control form-control-lg  @error('title') is-invalid @enderror" placeholder="Title" name="title" />
                                @error('title')
                                <p class='invalid-feedback'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label h4" for="content">Content</label>
                                <textarea class="form-control form-control-lg @error('content') is-invalid @enderror" placeholder="Content" name="content" cols="30" rows="5">{{ old('content') }}</textarea>
                                @error('content')
                                <p class='invalid-feedback'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label h4" for="author">Author</label>
                                <input type="text" value="{{ old('author') }}" class="form-control form-control-lg @error('author') is-invalid @enderror" placeholder="Author" name="author" />
                                @error('author')
                                <p class='invalid-feedback'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label h4" for="published_at">Published At</label>
                                <input type="date" value="{{ old('published_at') }}" class="form-control form-control-lg @error('published_at') is-invalid @enderror" name="published_at" />
                                @error('published_at')
                                <p class='invalid-feedback'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-lg btn-pink">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
