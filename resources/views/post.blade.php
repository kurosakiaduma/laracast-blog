<x-layout>
    <x-slot name="content">
        <article>
            <h1 class='text-center'>{{ $post->title }}</h1>
            <h4><strong>Category: </strong>{{ $post->category->name }}</h4>
            <h4><strong>Author: </strong>{{ $post->author }}</h4>
            <h4><strong>Date Published: </strong>{{ $post->date_published }}</h4>
            <div> {!! $post->body !!}</div>
        </article>
        <a href="/">Home</a>
    </x-slot>
</x-layout>
