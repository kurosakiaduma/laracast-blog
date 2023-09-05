@extends('layout')

@section('content')
    @foreach ($posts as $post)
        <article class="{{$loop->even ? 'odds':''}}">
            <a href="/posts/{{ $post->slug }}">
                <h1>{{$post->title }}</h1>
            </a>
            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach
@endsection
