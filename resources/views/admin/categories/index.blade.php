@extends('layouts.admin')
@section('title')| List of categories @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List of categories</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="#" class="btn btn-sm btn-outline-secondary">Create</a>
            </div>
        </div>
    </div>
    <h2>Categories</h2>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">Name</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ ucfirst($category) }}</td>
                </tr>
            @empty
                <p>There are no categories</p>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
