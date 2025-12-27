@props(['id'=>null])
@vite(['resources/js/like.js', 'resources/js/number-handler.js'])
<x-item-outline>
    <span id="likeSpan" data-id="{{ $id }}" class="flex flex-col items-center gap-0 cursor-pointer select-none">
        @include('home.partials.svg.heart', ['id'=>$id])
        <span class="number">{{ \App\Models\Likes::where('video_id', $id)->count() }}</span>
    </span>
</x-item-outline>