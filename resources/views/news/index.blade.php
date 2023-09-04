@extends('layouts.main')
@section('title')| {{ $category ?? 'All' }} @stop
@section('content')
    <h1>News | {{ ucfirst($category) ?? 'All' }}</h1>
    @foreach($news as $post)
        <div>
            <h2>[{{ ucfirst($post['category']) }}] {{ $post['title'] }}</h2>
            <p>{{ $post['description'] }}</p>
            <p>{{ $post['content'] }}</p>
            <a href="{{ route('news.show', ['category' => $post['category'], 'id' => $post['id']]) }}">Read more</a>
        </div>
    @endforeach
@endsection
