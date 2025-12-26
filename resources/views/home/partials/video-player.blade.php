@props(['url'=>''])
@vite(['resources/js/video-player.js'])
<video class="h-full w-80 rounded-md object-cover" src="{{ asset('storage/' . rawurlencode($url)) }}" type="video/mp4"></video>