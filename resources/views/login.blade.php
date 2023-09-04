@extends('layouts.main')
@section('title')| Authorization @stop
@section('content')
    <form action="#">
        <fieldset>
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
            <br />
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <br />
            <label for="remember-me">Remember me</label>
            <input type="checkbox" id="remember-me" name="remember-me">
            <br />
            <button type="submit">Log in</button>
        </fieldset>
    </form>
@endsection
