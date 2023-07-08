@extends('layouts.main')
@section('title')| Categories @stop
@section('content')
<h1>Categories</h1>
<div class="list-group">
    @foreach($categories as $category)
        <a href="/categories/{{ $category->id }}" class="list-group-item list-group-item-action">{{ ucfirst($category->name) }}</a>
    @endforeach
</div>
@endsection
