@extends('layouts.main')
@section('title')| {{ ucfirst($category->name) }} @stop
@section('content')
<h1 class="display-5 link-body-emphasis mb-1">Articles | {{ ucfirst($category->name) }}</h1>
@foreach($articles as $article)
    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary-emphasis">{{ ucfirst($category->name) }}</strong>
                <h3 class="mb-0">{{ $article->title }}</h3>
                <p class="card-text mb-auto">{{ $article->preview_content }}</p>
                <a href="/news/{{ $article->id }}" class="icon-link gap-1 icon-link-hover stretched-link">
                        Continue reading
                    <svg class="bi"><use xlink:href="#chevron-right"/></svg>
                </a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">📄</text></svg>
            </div>
        </div>
    </div>
@endforeach
@endsection
