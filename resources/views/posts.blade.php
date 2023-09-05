<x-layout>
    <x-slot name="content">
    @foreach ($posts as $post)
        <article class="{{$loop->even ? 'odds':''}}">
            <div>
                <a href="/posts/{{ $post->slug }}">
                    <h1>{{$post->title }}</h1>
                </a>
                <span><strong>Category: </strong><a href="/categories/{{$post->category->slug}}">{{ $post->category->name }}</a></span>
            </div>
            <br>
            <div>
                {!! $post->excerpt !!}
            </div>
        </article>
    @endforeach
    </x-slot>
</x-layout>
