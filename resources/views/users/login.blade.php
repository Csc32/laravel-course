<x-layout>
    <x-card class="max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Login
            </h2>
            <p class="mb-4">Log into your account to post a job</p>
        </header>

        <form method='POST' action="/users/authenticate">
            @csrf

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full dark:text-slate-950" name="email"
                    value="{{ old('email') }}" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full dark:text-slate-950"
                    name="password" value="{{ old('passwrod') }}" />

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-slate-700">
                    Sign in
                </button>
            </div>

            <div class="mt-8">
                <p>
                    don't have an account?
                    <a href="/login" class="text-laravel">Register</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>
