@props(['url'=>''])
@vite(['resources/js/video-player.js'])
<div class="relative w-80 h-full">
    <video
        class="h-full w-80 rounded-md object-cover"
        src="{{ asset('storage/' . rawurlencode($url)) }}"
        type="video/mp4"
    ></video>

    <!-- Overlay text -->
    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
        <span class="text-white font-bold" id="play-icon">
            @include('home.partials.svg.play')
        </span>
    </div>
</div>