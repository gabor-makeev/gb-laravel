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
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
                <tr>
                    <td>{{ $news['uuid'] }}</td>
                    <td>{{ $news['title'] }}</td>
                    <td>{{ $news['content'] }}</td>
                    <td>{{ $news['description'] }}</td>
                    <td>{{ $news['category'] }}</td>
                </tr>
            @empty
                <p>There are no news</p>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
