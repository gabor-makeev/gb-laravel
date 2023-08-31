@extends('layouts.main')
@section('title')| {{ $post['category'] }}: {{ $post['title'] }} @stop
@section('content')
    <h1>News | {{ $post['title'] }}</h1>
    <span>Category: {{ ucfirst($post['category']) }}</span>
    <p>{{ $post['description'] }}</p>
    <p>{{ $post['content'] }}</p>
@endsection
