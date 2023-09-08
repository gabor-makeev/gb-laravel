@extends('layouts.main')
@section('title')| {{ $post['category'] }}: {{ $post['title'] }} @stop
@section('content')
    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
        <div class="col-lg-6 px-0">
            <h1 class="display-6 fst-italic">{{ $post['title'] }}</h1>
        </div>
    </div>
    <p class="blog-post-meta">Category: {{ ucfirst($post['category']) }}</p>
    <div class="p-4 mb-3 bg-body-tertiary rounded">
        <h4 class="fst-italic">About</h4>
        <p class="mb-0">{{ $post['description'] }}</p>
    </div>
    <p>{{ $post['content'] }}</p>
@endsection
