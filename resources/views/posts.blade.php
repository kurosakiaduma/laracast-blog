<x-layout>
    @include('_posts-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-post-featured-card :post="$posts[0]"/>

        <div class="lg:grid lg:grid-cols-3">
            @foreach($posts as $post)
                @unless($loop->first)
                    <x-post-card :post="$post"/>
                @endunless
            @endforeach
        </div>

        <footer class="flex justify-between items-center mt-8">
        </footer>
    </main>
</x-layout>
