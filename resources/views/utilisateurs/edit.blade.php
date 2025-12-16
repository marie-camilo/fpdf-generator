<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier le profil de : <span class="text-indigo-600">{{ $utilisateur->prenomNom }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">

                <form method="POST" action="{{ route('utilisateurs.update', $utilisateur) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-y-4">
                        <div>
                            <label for="initiale" class="block text-sm font-medium text-gray-700">Initiale de l'entreprise</label>
                            <input type="text" name="initiale" id="initiale" value="{{ $utilisateur->initiale }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition">
                        </div>

                        <div>
                            <label for="prenomNom" class="block text-sm font-medium text-gray-700">Nom & Prénom</label>
                            <input type="text" name="prenomNom" id="prenomNom" value="{{ $utilisateur->prenomNom }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition">
                        </div>

                        <div>
                            <label for="fonction" class="block text-sm font-medium text-gray-700">Fonction / Poste</label>
                            <input type="text" name="fonction" id="fonction" value="{{ $utilisateur->fonction }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition">
                        </div>

                        <div>
                            <label for="mail" class="block text-sm font-medium text-gray-700">Adresse Email</label>
                            <input type="email" name="mail" id="mail" value="{{ $utilisateur->mail }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition">
                        </div>

                        <div>
                            <label for="telephone" class="block text-sm font-medium text-gray-700">Numéro de téléphone</label>
                            <input type="text" name="telephone" id="telephone" value="{{ $utilisateur->telephone }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition">
                        </div>
                    </div>

                    <div class="flex items-center justify-end space-x-4 border-t pt-6">
                        <a href="{{ route('utilisateurs.index') }}" class="text-sm text-gray-500 hover:text-gray-700">
                            Annuler
                        </a>
                        <button type="submit" class="inline-flex items-center px-6 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-150">
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
