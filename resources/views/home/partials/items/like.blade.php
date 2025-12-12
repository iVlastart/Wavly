@props(['id'=>null])
<x-item-outline>
    <form action="/like" method="post" id="likeForm" data-id="">
        @csrf
        @include('home.partials.svg.heart')
        <span>0</span>
    </form>
</x-item-outline>