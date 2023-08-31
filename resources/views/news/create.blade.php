@extends('layouts.main')
@section('title')| Create a post @stop
@section('content')
    <form action="#">
        <fieldset>
            <label for="title">Title</label>
            <input type="text" id="title" name="title">
            <br />
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
            <br />
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="15" rows="5"></textarea>
            <br />
            <button type="submit">Create</button>
        </fieldset>
    </form>
@endsection
