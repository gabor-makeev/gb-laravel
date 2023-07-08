@extends('layouts.main')
@section('title')| {{ $article->title }} @stop
@section('content')
<article class="blog-post">
    <h2 class="display-5 link-body-emphasis mb-1">{{ $article->title }}</h2>
    <p>{{ $article->preview_content }}</p>
    <hr>
    <p>{{ $article->content }}</p>
</article>
@endsection
