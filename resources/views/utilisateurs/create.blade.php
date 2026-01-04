<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nouvel Utilisateur') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ initiale: '', nom: '', fonction: '', mail: '', tel: '' }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6">
                <h3 class="text-lg font-bold text-gray-700 mb-4">Informations</h3>
                <form method="POST" action="{{ route('utilisateurs.store') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Initiale</label>
                        <input x-model="initiale" type="text" name="initiale" maxlength="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nom & Prénom</label>
                        <input x-model="nom" type="text" name="prenomNom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fonction</label>
                        <input x-model="fonction" type="text" name="fonction" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input x-model="mail" type="email" name="mail" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Téléphone</label>
                            <input x-model="tel" type="text" name="telephone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500">
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <button class="w-full bg-indigo-600 text-white px-4 py-3 rounded-xl font-bold hover:bg-indigo-700 transition shadow-lg">
                            Enregistrer et Créer
                        </button>
                    </div>
                </form>
            </div>

            <div class="sticky top-6">
                <h3 class="text-lg font-bold text-gray-700 mb-4">Aperçu en direct</h3>
                <div class="aspect-[1.54/1] bg-white rounded-lg shadow-2xl p-8 border border-gray-100 flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute -top-4 -right-2 text-[12rem] font-serif text-gray-100 font-bold" x-text="initiale.toUpperCase()"></div>

                    <div class="relative">
                        <div class="w-12 h-12 bg-indigo-600 rounded-lg flex items-center justify-center text-white text-2xl font-bold mb-4 shadow-md" x-text="initiale.toUpperCase() || '?'"></div>
                        <h4 class="text-2xl font-bold text-indigo-900 uppercase tracking-tight" x-text="nom || 'NOM PRÉNOM'"></h4>
                        <p class="text-indigo-500 font-medium" x-text="fonction || 'Votre profession'"></p>
                    </div>

                    <div class="relative pt-6 border-t border-gray-100">
                        <div class="flex items-center text-sm text-gray-600 mb-1">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span x-text="mail || 'email@exemple.com'"></span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span x-text="tel || '06 00 00 00 00'"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
