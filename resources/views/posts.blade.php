<x-layout>
    <x-slot name="content">
    @foreach ($posts as $post)
        <article class="{{$loop->even ? 'odds':''}}">
            <div>
                <a href="/posts/{{ $post->slug }}">
                    <h1>{{$post->title }}</h1>
                </a>
                <h4><strong>By </strong><a href="#">{{ $post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{ $post->category->name }}</a></h4>
            </div>
            <br>
            <div>
                {!! $post->excerpt !!}
            </div>
        </article>
    @endforeach
    </x-slot>
</x-layout>
