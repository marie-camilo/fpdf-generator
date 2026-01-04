<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Détails de l'utilisateur
            </h2>
            <a href="{{ route('utilisateurs.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900 font-medium">
                Retour à la liste
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-indigo-600 px-6 py-8 text-center">
                    <div class="inline-flex items-center justify-center h-24 w-24 bg-white text-indigo-600 rounded-full text-4xl font-bold shadow-inner mb-4">
                        {{ $utilisateur->initiale }}
                    </div>
                    <h3 class="text-2xl font-bold text-white uppercase tracking-wider">
                        {{ $utilisateur->prenomNom }}
                    </h3>
                    <p class="text-indigo-100 font-medium">{{ $utilisateur->fonction }}</p>
                </div>

                <div class="px-6 py-8 space-y-10">

                    <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Adresse Email</dt>
                            <dd class="mt-1 text-sm text-gray-900 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                {{ $utilisateur->mail }}
                            </dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Téléphone</dt>
                            <dd class="mt-1 text-sm text-gray-900 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                {{ $utilisateur->telephone }}
                            </dd>
                        </div>
                    </dl>

                    <div class="border-t pt-8">
                        <dt class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Aperçu de la carte de visite</dt>

                        <div class="relative mx-auto w-full max-w-md aspect-[1.54/1] bg-white rounded-lg shadow-2xl p-8 border border-gray-100 flex flex-col justify-between overflow-hidden">
                            <div class="absolute -top-4 -right-2 text-[12rem] font-serif text-gray-50 font-bold select-none pointer-events-none">
                                {{ strtoupper($utilisateur->initiale) }}
                            </div>

                            <div class="relative">
                                <div class="w-12 h-12 bg-indigo-600 rounded-lg flex items-center justify-center text-white text-2xl font-bold mb-4 shadow-md">
                                    {{ strtoupper($utilisateur->initiale) }}
                                </div>
                                <h4 class="text-2xl font-bold text-indigo-900 uppercase tracking-tight">
                                    {{ $utilisateur->prenomNom }}
                                </h4>
                                <p class="text-indigo-500 font-medium">{{ $utilisateur->fonction }}</p>
                            </div>

                            <div class="relative pt-6 border-t border-gray-100 flex justify-between items-end">
                                <div class="space-y-2">
                                    <div class="flex items-center text-xs text-gray-600">
                                        <svg class="w-3.5 h-3.5 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        <span class="font-medium">{{ $utilisateur->mail }}</span>
                                    </div>

                                    <div class="flex items-center text-xs text-gray-600">
                                        <svg class="w-3.5 h-3.5 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                        <span class="font-medium">{{ $utilisateur->telephone }}</span>
                                    </div>
                                </div>
                                <div class="w-12 h-12 bg-gray-50 border border-gray-200 rounded flex items-center justify-center text-[8px] text-gray-300 text-center leading-tight p-1">
                                    QR CODE<br>PDF ONLY
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-6 py-4 flex justify-between items-center">
                    <form action="{{ route('utilisateurs.destroy', $utilisateur) }}" method="POST" onsubmit="return confirm('Supprimer définitivement ?')">
                        @csrf @method('DELETE')
                        <button class="text-red-400 hover:text-red-600 text-sm font-medium transition">Supprimer l'utilisateur</button>
                    </form>

                    <div class="space-x-3">
                        <a href="{{ route('utilisateurs.edit', $utilisateur) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition">
                            Modifier
                        </a>
                        <a href="{{ route('utilisateurs.pdf.solo', $utilisateur) }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 shadow-md transition">
                            Générer Carte PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
