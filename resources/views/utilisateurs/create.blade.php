<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-cardify-dark leading-tight">
            {{ __('Nouvel Employé') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen" x-data="{ initiale: '', nom: '', fonction: '', mail: '', tel: '' }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-12">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl p-8 border border-gray-100">
                <div class="flex items-center mb-8">
                    <div class="p-2 bg-cardify-teal/10 rounded-lg text-cardify-teal mr-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-cardify-dark">Fiche d'informations</h3>
                </div>

                <form method="POST" action="{{ route('utilisateurs.store') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Initiales</label>
                        <input x-model="initiale" type="text" name="initiale" maxlength="2" placeholder="Ex: JD"
                               class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-cardify-teal focus:ring focus:ring-cardify-teal/20 transition-all duration-200 font-bold text-cardify-dark uppercase">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Nom & Prénom</label>
                        <input x-model="nom" type="text" name="prenomNom" placeholder="Jean DUPONT"
                               class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-cardify-teal focus:ring focus:ring-cardify-teal/20 transition-all duration-200 font-medium text-cardify-dark">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Fonction</label>
                        <input x-model="fonction" type="text" name="fonction" placeholder="Directeur Commercial"
                               class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-cardify-teal focus:ring focus:ring-cardify-teal/20 transition-all duration-200 font-medium text-cardify-dark">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Email</label>
                            <input x-model="mail" type="email" name="mail" placeholder="jean@cardify.app"
                                   class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-cardify-teal focus:ring focus:ring-cardify-teal/20 transition-all duration-200 font-medium text-cardify-dark">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Téléphone</label>
                            <input x-model="tel" type="text" name="telephone" placeholder="06 00 00 00 00"
                                   class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-cardify-teal focus:ring focus:ring-cardify-teal/20 transition-all duration-200 font-medium text-cardify-dark">
                        </div>
                    </div>

                    <div class="flex items-center mt-8 pt-4 border-t border-gray-50">
                        <button class="btn-cardify">
                            Enregistrer et Créer la carte
                        </button>
                    </div>
                </form>
            </div>

            <div class="sticky top-12">
                <div class="flex items-center mb-6">
                    <div class="p-2 bg-cardify-gold/10 rounded-lg text-cardify-gold mr-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-cardify-dark">Aperçu en temps réel</h3>
                </div>

                <div class="aspect-[1.54/1] bg-white rounded-2xl shadow-2xl p-8 border border-gray-100 flex flex-col justify-between relative overflow-hidden transition-all duration-500 hover:scale-[1.02]">
                    <div class="absolute -top-10 -right-5 text-[15rem] font-bold text-slate-50 select-none pointer-events-none uppercase" x-text="initiale"></div>

                    <div class="relative">
                        <div class="w-14 h-14 bg-cardify-teal rounded-xl flex items-center justify-center text-white text-2xl font-black mb-4 shadow-lg shadow-cardify-teal/30 uppercase" x-text="initiale || '?'"></div>

                        <h4 class="text-3xl font-black text-cardify-dark uppercase tracking-tighter leading-none mb-1" x-text="nom || 'NOM PRÉNOM'"></h4>
                        <p class="text-cardify-teal font-bold text-sm uppercase tracking-widest" x-text="fonction || 'Profession de l\'employé'"></p>
                    </div>

                    <div class="relative pt-6 border-t border-gray-100 flex justify-between items-end">
                        <div class="space-y-2">
                            <div class="flex items-center text-[10px] text-gray-500 font-bold">
                                <div class="w-1.5 h-1.5 rounded-full bg-cardify-teal mr-3"></div>
                                <span x-text="mail || 'email@exemple.com'"></span>
                            </div>
                            <div class="flex items-center text-[10px] text-gray-500 font-bold">
                                <div class="w-1.5 h-1.5 rounded-full bg-cardify-gold mr-3"></div>
                                <span x-text="tel || '06 00 00 00 00'"></span>
                            </div>
                        </div>
                        <div class="w-12 h-12 bg-slate-50 border border-dashed border-gray-200 rounded-lg flex items-center justify-center text-[7px] text-gray-400 text-center font-black uppercase">
                            QR Code<br>PDF Only
                        </div>
                    </div>
                </div>
                <p class="mt-8 text-center text-xs text-gray-400 italic">
                    Le format PDF sera généré automatiquement au format 85x55mm.
                </p>
            </div>

        </div>
    </div>
</x-app-layout>
