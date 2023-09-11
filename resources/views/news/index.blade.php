@extends('layouts.main')
@section('title')| {{ $category ?? 'All' }} @stop
@section('content')
    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
        <div class="col-lg-6 px-0">
            <h1 class="display-6 fst-italic">{{ ucfirst($category) ?? 'All' }}</h1>
        </div>
    </div>
    <div class="row mb-2">
        @forelse($news as $post)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis">{{ ucfirst($post['category']) }}</strong>
                        <h3 class="mb-0">{{ $post['title'] }}</h3>
                        <p class="card-text mb-auto">{{ $post['description'] }}</p>
                        <a href="{{ route('news.show', ['category' => $post['category'], 'uuid' => $post['uuid']]) }}" class="icon-link gap-1 icon-link-hover stretched-link">
                            Read more
                            <svg class="bi"><use xlink:href="#chevron-right"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p>There are no news</p>
        @endforelse
    </div>
@endsection
