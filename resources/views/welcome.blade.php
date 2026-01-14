<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cardify - Instant Business Cards</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans antialiased text-cardify-dark">
<div class="relative min-h-screen flex flex-col items-center">

    <nav class="w-full max-w-7xl mx-auto px-6 py-8 flex justify-between items-center z-10">
        <x-application-logo />

        <div class="flex items-center gap-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-cardify">Mon Compte</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold hover:text-cardify-teal transition">Connexion</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn-cardify">Essayer gratuitement</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <main class="flex-1 w-full max-w-7xl mx-auto px-6 flex flex-col lg:flex-row items-center justify-center gap-12 py-12">

        <div class="lg:w-1/2 text-center lg:text-left space-y-8">
            <div class="inline-block px-4 py-1.5 bg-cardify-teal/10 rounded-full">
                <span class="text-cardify-teal text-sm font-bold uppercase tracking-wider">Simple. Rapide. Professionnel.</span>
            </div>

            <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight leading-tight">
                Vos cartes de visite en <span class="text-cardify-teal">un clic.</span>
            </h1>

            <p class="text-lg text-gray-600 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                Cardify transforme vos données en cartes de visite élégantes et prêtes à imprimer. Gagnez du temps et assurez votre image de marque instantanément.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                <a href="{{ route('register') }}" class="btn-cardify">
                    Commencer maintenant
                </a>
            </div>
        </div>

        <div class="lg:w-1/2 relative group">
            <div class="absolute -inset-4 bg-gradient-to-tr from-cardify-teal/20 to-cardify-gold/20 rounded-[2rem] blur-2xl opacity-50 group-hover:opacity-75 transition duration-1000"></div>

            <div class="relative bg-white rounded-2xl shadow-2xl border border-white/50 p-10 aspect-[1.54/1] w-full max-w-lg overflow-hidden transform hover:-rotate-2 hover:scale-105 transition-all duration-500">
                <div class="absolute -top-10 -right-5 text-[15rem] font-bold text-slate-50 select-none">DR</div>

                <div class="relative h-full flex flex-col justify-between">
                    <div>
                        <div class="w-14 h-14 bg-cardify-teal rounded-xl flex items-center justify-center text-white text-2xl font-bold shadow-lg mb-6">DR</div>
                        <h2 class="text-3xl font-bold tracking-tight uppercase">Damien Renault</h2>
                        <p class="text-cardify-teal font-semibold">Programmeur Analyste</p>
                    </div>

                    <div class="pt-6 border-t border-slate-100 space-y-2">
                        <div class="flex items-center text-sm text-gray-500">
                            <div class="w-2 h-2 rounded-full bg-cardify-teal mr-3"></div>
                            damien@cardify.app
                        </div>
                        <div class="flex items-center text-sm text-gray-500">
                            <div class="w-2 h-2 rounded-full bg-cardify-gold mr-3"></div>
                            06 83 68 36 85
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="w-full py-8 text-center text-sm text-gray-400">
        &copy; {{ date('Y') }} Cardify. {{ __('Tous droits réservés.') }}
    </footer>
</div>
</body>
</html>
