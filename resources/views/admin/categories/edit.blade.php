@extends('layouts.admin')
@section('title')| Edit the "{{ $category->name }}" category @stop
@section('content')
    <form method="post" action="{{ route('admin.categories.update', $category) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Some category name" value="{{ old('name') }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Edit</button>
        </div>
    </form>
@endsection
