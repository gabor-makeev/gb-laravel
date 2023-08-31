@extends('layouts.main')
@section('title')| Categories @stop
@section('content')
    <h1>Categories</h1>
    <ul>
        @foreach($categories as $category)
            <li><a href="{{ route('news.index', ['category' => $category]) }}">{{ ucfirst($category) }}</a></li>
        @endforeach
    </ul>
@endsection
