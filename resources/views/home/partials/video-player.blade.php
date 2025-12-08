@props(['url'=>''])
<video class="h-full w-80 rounded-md object-cover">
    <source src="{{ asset('storage/' . rawurlencode($url)) }}" type="video/mp4">
    Your browser does not support the video tag.
</video>