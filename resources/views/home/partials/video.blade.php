@props(['video'=>null])
<div class="flex flex-row h-[70vh] w-[30vw]">
    @if(!$video)
        <p>No video available.</p>
    @else
        @include('home.partials.video-player', ['url'=>$video->src])
        @include('home.partials.right-panel', ['video'=>$video])
    @endif
</div>