<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-cardify-dark border border-transparent rounded-xl font-bold text-xs text-white uppercase tracking-widest hover:bg-cardify-teal focus:outline-none focus:ring-2 focus:ring-cardify-teal focus:ring-offset-2 transition-colors duration-200 ease-in-out']) }}>
    {{ $slot }}
</button>
