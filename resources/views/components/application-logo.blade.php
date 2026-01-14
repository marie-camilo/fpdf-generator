@props(['simple' => false])

<div class="flex items-center">
    <img src="{{ asset('/logo.png') }}" {{ $attributes->merge(['class' => $simple ? 'h-9 w-auto' : 'h-16 w-auto']) }} alt="Logo">

    @if(!$simple)
        <div class="ml-4 flex flex-col justify-center border-l-2 pl-4 border-cardify-teal">
            <h1 class="text-3xl font-bold tracking-tight leading-none text-cardify-dark">
                Cardify
            </h1>
            <p class="text-[10px] uppercase font-bold tracking-[0.2em] mt-1 text-cardify-gold">
                Instant business cards
            </p>
        </div>
    @endif
</div>
