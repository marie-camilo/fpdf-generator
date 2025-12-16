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

                <div class="border-t border-gray-200 px-6 py-6">
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

                        <div class="sm:col-span-2 border-t pt-4">
                            <dt class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Identifiant unique</dt>
                            <dd class="mt-1 text-sm text-gray-400 font-mono">ID #{{ $utilisateur->id }}</dd>
                        </div>
                    </dl>
                </div>

                <div class="bg-gray-50 px-6 py-4 flex justify-between items-center">
                    <form action="{{ route('utilisateurs.destroy', $utilisateur) }}" method="POST" onsubmit="return confirm('Supprimer définitivement ?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:text-red-800 text-sm font-semibold">Supprimer l'utilisateur</button>
                    </form>

                    <div class="space-x-3">
                        <a href="{{ route('utilisateurs.edit', $utilisateur) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Modifier
                        </a>
                        <a href="{{ route('utilisateurs.pdf.solo', $utilisateur) }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Générer Carte PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
