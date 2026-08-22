@props(['disabled' => false])

<input
    @disabled($disabled)
    {{ $attributes->merge(['class' => 'w-full px-3.5 py-2.5 rounded-xl border text-sm transition-colors
        bg-white dark:bg-gray-900
        text-gray-900 dark:text-white
        placeholder-gray-400 dark:placeholder-gray-600
        border-gray-300 dark:border-gray-700
        focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500
        dark:focus:ring-cyan-400 dark:focus:border-cyan-400
        focus:outline-none
        disabled:opacity-50 disabled:cursor-not-allowed']) }}
>
