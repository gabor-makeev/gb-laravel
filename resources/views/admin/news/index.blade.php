@extends('layouts.admin')
@section('title')| List of news @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List of news</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">Create</a>
            </div>
        </div>
    </div>
    <h2>News</h2>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Status</th>
                <th scope="col">Image</th>
            </tr>
            </thead>
            <tbody>
            @forelse($news as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->category_name }}</td>
                    <td>{{ $post->status }}</td>
                    <td><img style="max-width: 100px; max-height: 100px" alt="post image" src="{{ $post->image_url ? asset($post->image_url) : asset('storage/placeholder.png') }}"></td>
                </tr>
            @empty
                <p>There are no news</p>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
