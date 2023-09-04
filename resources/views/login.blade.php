@extends('layouts.main')
@section('title')| Authorization @stop
@section('content')
    <form action="#">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Some username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Some secure password">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="remember-me" name="remember-me">
            <label class="form-check-label" for="remember-me">
                Remember me
            </label>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Log in</button>
        </div>
    </form>
@endsection
