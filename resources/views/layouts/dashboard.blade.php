@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ route('news.index') }}" class="list-group-item list-group-item-action">List of News</a>
                    <a href="{{ route('news.create') }}" class="list-group-item list-group-item-action">Add News</a>
                    <a href="#" class="list-group-item list-group-item-action">Profile</a>
                </div>
            </div>
            <div class="col-md-9">
                @yield('dashboard-content')
            </div>
        </div>
    </div>
@endsection
