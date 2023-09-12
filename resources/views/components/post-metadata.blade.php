@props(['post'])

<div class="flex justify-between items-center">
    <div class="space-x-2">
        <x-category-button :category="$post->category" />
    </div>
    <div class="ml-2">
        @if ($post->status === 'published')
            <span class="inline-block px-2 py-1 bg-green-500 text-white text-xs font-semibold rounded-full">
                                Published
                            </span>
        @elseif ($post->status === 'draft')
            <span class="inline-block px-2 py-1 bg-yellow-500 text-white text-xs font-semibold rounded-full">
                                Draft
                            </span>
        @endif
    </div>
</div>
