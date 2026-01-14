<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-cardify-dark leading-tight">
            Modifier le profil de : <span class="text-cardify-teal">{{ $utilisateur->prenomNom }}</span>
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-8">

                <form method="POST" action="{{ route('utilisateurs.update', $utilisateur) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-y-5">
                        <div>
                            <label for="initiale" class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Initiales</label>
                            <input type="text" name="initiale" id="initiale" value="{{ $utilisateur->initiale }}" maxlength="2"
                                   class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-cardify-teal focus:ring focus:ring-cardify-teal/20 transition-all duration-200 font-bold text-cardify-dark">
                        </div>

                        <div>
                            <label for="prenomNom" class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Nom & Prénom</label>
                            <input type="text" name="prenomNom" id="prenomNom" value="{{ $utilisateur->prenomNom }}"
                                   class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-cardify-teal focus:ring focus:ring-cardify-teal/20 transition-all duration-200 text-cardify-dark font-medium">
                        </div>

                        <div>
                            <label for="fonction" class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Fonction / Poste</label>
                            <input type="text" name="fonction" id="fonction" value="{{ $utilisateur->fonction }}"
                                   class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-cardify-teal focus:ring focus:ring-cardify-teal/20 transition-all duration-200 text-cardify-dark font-medium">
                        </div>

                        <div>
                            <label for="mail" class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Adresse Email</label>
                            <input type="email" name="mail" id="mail" value="{{ $utilisateur->mail }}"
                                   class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-cardify-teal focus:ring focus:ring-cardify-teal/20 transition-all duration-200 text-cardify-dark font-medium">
                        </div>

                        <div>
                            <label for="telephone" class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Numéro de téléphone</label>
                            <input type="text" name="telephone" id="telephone" value="{{ $utilisateur->telephone }}"
                                   class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-cardify-teal focus:ring focus:ring-cardify-teal/20 transition-all duration-200 text-cardify-dark font-medium">
                        </div>
                    </div>

                    <div class="flex items-center justify-end space-x-4 border-t border-gray-50 pt-8 mt-4">
                        <a href="{{ route('utilisateurs.index') }}" class="btn-ghost py-2 px-6">
                            Annuler
                        </a>
                        <button type="submit" class="btn-cardify py-3 px-8">
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
