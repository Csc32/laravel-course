@props(['tagsCsv'])

@php
$tags = explode(',', $tagsCsv);
@endphp

<ul class="flex items-center justify-content-center">
    @foreach ($tags as $tag)
    <li class="rounded-xl px-3 py-1 mr-2  bg-black text-white dark:text-black dark:bg-white ">
        <a href="/?tag={{ $tag }}">{{ $tag }}</a>
    </li>
    @endforeach

</ul>
