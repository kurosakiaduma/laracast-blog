<x-layout>
    @include('_posts-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())

        @else
            <p class="header bold">No stories here yet! ☹️ Please check back later 🥺</p>
        @endif

        <footer class="flex justify-between items-center mt-8">
        </footer>
    </main>
</x-layout>
