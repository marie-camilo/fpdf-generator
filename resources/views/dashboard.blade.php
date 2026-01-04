<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de Bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border-l-4 border-indigo-500">
                    <div class="flex items-center">
                        <div class="p-3 bg-indigo-100 rounded-lg text-indigo-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500 uppercase font-bold tracking-wider">Utilisateurs</p>
                            <p class="text-2xl font-semibold text-gray-800">{{ \App\Models\Utilisateur::count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border-l-4 border-green-500">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-lg text-green-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500 uppercase font-bold tracking-wider">Format Carte</p>
                            <p class="text-2xl font-semibold text-gray-800">85 x 55 mm</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border-l-4 border-blue-500">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-lg text-blue-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500 uppercase font-bold tracking-wider">Dernier Ajout</p>
                            <p class="text-md font-semibold text-gray-800">{{ \App\Models\Utilisateur::latest()->first()->prenomNom ?? 'Aucun' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-1 space-y-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Actions Rapides</h3>

                    <a href="{{ route('utilisateurs.create') }}" class="flex items-center p-4 bg-indigo-600 rounded-xl text-white hover:bg-indigo-700 transition shadow-lg group">
                        <div class="p-2 bg-indigo-500 rounded-lg mr-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"></path></svg>
                        </div>
                        <span class="font-medium">Créer un profil</span>
                    </a>

                    <a href="{{ route('series') }}" target="_blank" class="flex items-center p-4 bg-white border border-gray-200 rounded-xl text-gray-700 hover:bg-gray-50 transition shadow-sm group">
                        <div class="p-2 bg-gray-100 rounded-lg mr-4 group-hover:rotate-12 transition-transform text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                        </div>
                        <span class="font-medium">Imprimer toute la série</span>
                    </a>
                </div>

                <div class="lg:col-span-2">
                    <div class="bg-white border border-gray-100 rounded-2xl p-8 shadow-sm">
                        <h3 class="text-lg font-medium text-gray-900 mb-6">Aperçu du Modèle Actuel</h3>

                        <div class="relative w-full max-w-sm mx-auto aspect-[1.54/1] bg-white border border-gray-200 rounded-lg shadow-2xl p-6 flex flex-col justify-center items-center overflow-hidden">
                            <div class="text-5xl font-serif text-indigo-900/20 absolute top-4 right-6 select-none italic">
                                R
                            </div>
                            <div class="text-center">
                                <h4 class="text-indigo-900 font-bold uppercase tracking-widest text-lg">Prénom NOM</h4>
                                <p class="text-indigo-600 text-sm font-medium">Profession de l'utilisateur</p>
                            </div>
                            <div class="w-4/5 h-px bg-gray-200 my-4"></div>
                            <div class="text-center space-y-1">
                                <p class="text-[10px] text-gray-500 font-mono italic">contact@email.fr</p>
                                <p class="text-[10px] text-gray-500 font-mono tracking-tighter">06 XX XX XX XX</p>
                            </div>
                            <div class="absolute bottom-0 left-0 w-full h-1 bg-indigo-600"></div>
                        </div>

                        <div class="mt-8 text-center">
                            <p class="text-sm text-gray-500">
                                Le format est optimisé pour les imprimantes professionnelles (85x55mm).
                                Les polices utilisées sont <span class="font-serif">Times</span> et <span class="font-sans">Helvetica</span>.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
