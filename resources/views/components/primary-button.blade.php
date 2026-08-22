<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center gap-2 px-5 py-2.5 bg-cyan-500 hover:bg-cyan-600 border border-transparent rounded-xl font-semibold text-sm text-white shadow-md shadow-cyan-500/20 hover:shadow-lg hover:shadow-cyan-500/30 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900 transition-all duration-150']) }}>
    {{ $slot }}
</button>
