<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-intern border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-intern/90 focus:bg-intern/80 active:bg-intern/90 focus:outline-none focus:ring-2 focus:ring-intern/60 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
