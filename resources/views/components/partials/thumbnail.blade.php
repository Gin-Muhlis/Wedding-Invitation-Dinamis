@props([
    'src',
    'size' => 50,
])

@if($src)
<img src="{{ $src }}" class="border rounded" style="width: {{ $size }}px; height: {{ $size }}px; object-fit: cover;">
@else
<div class="border rounded bg-light" style="width: {{ $size }}px; height: {{ $size }}px;"></div>
@endif