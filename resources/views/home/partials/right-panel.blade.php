@props(['video'=>null])
<div class="flex flex-col h-full mx-auto justify-center">
    @include('home.partials.items.like', ['id'=>$video?->id])
    @include('home.partials.items.comment')
</div>