<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de Bord') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border-l-4 border-cardify-teal">
                    <div class="flex items-center">
                        <div class="p-3 bg-cardify-teal/10 rounded-lg text-cardify-teal">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-xs text-gray-400 uppercase font-bold tracking-widest">Utilisateurs</p>
                            <p class="text-2xl font-extrabold text-cardify-dark">{{ auth()->user()->utilisateurs->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border-l-4 border-cardify-gold">
                    <div class="flex items-center">
                        <div class="p-3 bg-cardify-gold/10 rounded-lg text-cardify-gold">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-xs text-gray-400 uppercase font-bold tracking-widest">Format Carte</p>
                            <p class="text-2xl font-extrabold text-cardify-dark">85 x 55 mm</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border-l-4 border-cardify-dark">
                    <div class="flex items-center">
                        <div class="p-3 bg-cardify-dark/10 rounded-lg text-cardify-dark">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-xs text-gray-400 uppercase font-bold tracking-widest">Dernier Profil</p>
                            <p class="text-md font-bold text-cardify-dark truncate">
                                {{ auth()->user()->utilisateurs()->latest()->first()->prenomNom ?? 'Aucun' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-1 space-y-6">
                    <h3 class="text-lg font-bold text-cardify-dark mb-4">Actions Rapides</h3>

                    <a href="{{ route('utilisateurs.create') }}" class="btn-cardify w-full py-4 shadow-xl flex justify-start pl-6 group">
                        <div class="p-2 bg-white/20 rounded-lg mr-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"></path></svg>
                        </div>
                        <span class="text-sm">Nouveau Profil</span>
                    </a>

                    <a href="{{ route('series') }}" target="_blank" class="flex items-center p-4 bg-white border border-gray-200 rounded-xl text-gray-600 hover:border-cardify-teal hover:text-cardify-teal transition shadow-sm group">
                        <div class="p-2 bg-slate-50 rounded-lg mr-4 group-hover:rotate-12 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                        </div>
                        <span class="font-bold text-sm uppercase tracking-wider">Série Complète (PDF)</span>
                    </a>
                </div>

                <div class="lg:col-span-2">
                    <div class="bg-white border border-gray-100 rounded-2xl p-8 shadow-sm relative overflow-hidden">
                        <h3 class="text-lg font-bold text-cardify-dark mb-6">Modèle Cardify Actuel</h3>

                        <div class="relative w-full max-w-sm mx-auto aspect-[1.54/1] bg-white border border-gray-100 rounded-lg shadow-2xl p-8 flex flex-col justify-between overflow-hidden">
                            <div class="absolute -top-4 -right-2 text-[12rem] font-bold text-slate-50 select-none">DR</div>

                            <div class="relative">
                                <div class="w-12 h-12 bg-cardify-teal rounded-lg flex items-center justify-center text-white text-2xl font-bold mb-4 shadow-md">R</div>
                                <h4 class="text-2xl font-bold text-cardify-dark uppercase tracking-tight">Damien Renault</h4>
                                <p class="text-cardify-teal font-medium text-sm">Programmeur Analyste</p>
                            </div>

                            <div class="relative pt-6 border-t border-gray-100">
                                <div class="flex items-center text-[10px] text-gray-500 mb-1">
                                    <div class="w-1.5 h-1.5 rounded-full bg-cardify-teal mr-2"></div>
                                    damien@cardify.app
                                </div>
                                <div class="flex items-center text-[10px] text-gray-500">
                                    <div class="w-1.5 h-1.5 rounded-full bg-cardify-gold mr-2"></div>
                                    06 83 68 36 85
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 text-center">
                            <p class="text-xs text-gray-400 font-medium tracking-wide">
                                Optimisé pour impression offset 300dpi • Format standard ISO 7810
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
