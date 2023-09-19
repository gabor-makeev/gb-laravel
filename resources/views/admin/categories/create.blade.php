@extends('layouts.admin')
@section('title')| Create a category @stop
@section('content')
    <form method="post" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Some category name" value="{{ old('name') }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Create</button>
        </div>
    </form>
@endsection
