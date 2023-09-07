@props(['post'])
<span class="mt-2 block text-gray-400 text-xs">
    @php
        use Carbon\Carbon;
        $date = (\Carbon\Carbon::parse($post->date_published))->diffForHumans(Carbon::now());
    @endphp
    Published <time>{{ $date }}</time>
</span>
