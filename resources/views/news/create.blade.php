@extends('layouts.main')
@section('title')| Create a post @stop
@section('content')
    <form action="#">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Some article title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" cols="30" rows="3" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Create</button>
        </div>
    </form>
@endsection
