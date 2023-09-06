<x-layout>
    <x-slot name="content">
        <span>
            <h1 style="text-decoration: underline">{{ $post->title }}</h1>
            <h4><strong>By </strong><a href="#">{{ $post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{ $post->category->name }}</a></h4>
            <h4><strong>Date Published: </strong>{{ $post->date_published }}</h4>
            <div> {!! $post->body !!}</div>
        </article>
        <a href="/">Home</a>
    </x-slot>
</x-layout>
