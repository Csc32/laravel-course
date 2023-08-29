<button {{ $attributes->merge(['class' => 'bg-black rounded-full w-[3em]  py-2 hover:bg-gray-200 transition-all ease-out dark:bg-white dark:hover:bg-slate-600 dark:transition-all dark:ease-out']) }} @click="darkMode = ! darkMode" x-text="darkMode ? '☀' : '🌕'">
    🌕
</button>
