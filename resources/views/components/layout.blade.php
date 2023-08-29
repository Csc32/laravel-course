<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: false }" x-init="console.log(darkMode);
if (!('darkMode' in localStorage) && window.matchMedia('prefers-color-scheme: dark').matches) {
    localStorage.setItem('darkMode', JSON.stringify(true));
}
darkMode = JSON.parse(localStorage.getItem('darkMode'));

$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" x-cloak x-bind:class="{ dark: darkMode === true }">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>LaraGigs | Find Laravel Jobs & Projects</title>
</head>

<body class="mb-48 text-black bg-white dark:bg-slate-950 dark:text-white">
    <x-flash-message />

    <nav class="flex justify-between mb-4 items-center">
        <a href="/"><img class="w-24" src="{{ asset('images/logo.png') }}" alt="" class="logo" /></a>
        <ul class="flex justify-end items-center gap-8 text-md font-bold h-[2.5em] min-w-[75vw] px-5 md:text-lg">
            @auth
            <li class="grow shrink">
                <span class="font-bold uppercase"> Welcome {{ auth()->user()->name }} </span>
            </li>
            <li class="grow shrink">
                <a href="/listings/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>
                    Manage listings</a>
            </li>
            <li class="grow sm:shrink">

                <form method="POST" action="/logout" class="inline">
                    @csrf

                    <button type="submit" class="hover:text-laravel">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>

                </form>

            </li>
            @else
            <li class="shrink">
                <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
            </li>
            <li class="shrink">
                <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a>
            </li>
            @endauth
            <x-button />
        </ul>
    </nav>

    {{-- VIEW OUTPUT --}}
    {{ $slot }}
</body>
<footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
    <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

    <a href="/listings/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Job</a>
</footer>

</html>
