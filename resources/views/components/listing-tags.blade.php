@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);
@endphp

<ul class="flex">
    @foreach ($tags as $tag)
        <li
            class="flex items-center justify-content-center bg-black text-white rounded-xl px-3 py-1 mr-2 dark:text-black dark:bg-white">
            <a href="/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
    @endforeach

</ul>
