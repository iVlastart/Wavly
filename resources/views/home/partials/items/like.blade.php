@props(['id'=>null])
@vite(['resources/js/like.js'])
<x-item-outline>
    <span id="likeSpan" data-id="{{ $id }}">
        @include('home.partials.svg.heart')
        <span>0</span>
    </span>
</x-item-outline>