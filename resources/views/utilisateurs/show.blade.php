<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-cardify-dark leading-tight">
                Détails de l'employé
            </h2>
            <a href="{{ route('utilisateurs.index') }}" class="btn-cardify">
                Retour à la liste
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="bg-cardify-dark px-6 py-10 text-center relative overflow-hidden">
                    <div class="relative z-10">
                        <div class="inline-flex items-center justify-center h-24 w-24 bg-white text-cardify-teal rounded-2xl text-4xl font-black shadow-xl mb-4">
                            {{ $utilisateur->initiale }}
                        </div>
                        <h3 class="text-2xl font-extrabold text-white uppercase tracking-tighter">
                            {{ $utilisateur->prenomNom }}
                        </h3>
                        <p class="text-white font-bold uppercase tracking-widest text-xs mt-1">{{ $utilisateur->fonction }}</p>
                    </div>
                </div>

                <div class="px-8 py-10 space-y-12">

                    <dl class="grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-2">Adresse Email</dt>
                            <dd class="text-sm text-cardify-dark font-bold flex items-center">
                                <div class="p-2 bg-cardify-teal/10 rounded-lg mr-3">
                                    <svg class="w-4 h-4 text-cardify-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </div>
                                {{ $utilisateur->mail }}
                            </dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-2">Téléphone</dt>
                            <dd class="text-sm text-cardify-dark font-bold flex items-center">
                                <div class="p-2 bg-cardify-gold/10 rounded-lg mr-3">
                                    <svg class="w-4 h-4 text-cardify-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                </div>
                                {{ $utilisateur->telephone }}
                            </dd>
                        </div>
                    </dl>

                    <div class="pt-10 border-t border-gray-100">
                        <div class="relative mx-auto w-full max-w-sm aspect-[1.54/1] bg-white rounded-lg shadow-2xl p-8 border border-gray-100 flex flex-col justify-between overflow-hidden">
                            <div class="absolute -top-4 -right-2 text-[12rem] font-bold text-slate-50 select-none pointer-events-none">
                                {{ $utilisateur->initiale }}
                            </div>

                            <div class="relative">
                                <div class="w-12 h-12 bg-cardify-teal rounded-lg flex items-center justify-center text-white text-xl font-black mb-4 shadow-lg shadow-cardify-teal/20">
                                    {{ $utilisateur->initiale }}
                                </div>
                                <h4 class="text-2xl font-black text-cardify-dark uppercase tracking-tighter leading-none mb-1">
                                    {{ $utilisateur->prenomNom }}
                                </h4>
                                <p class="text-cardify-teal font-bold text-xs uppercase tracking-widest">{{ $utilisateur->fonction }}</p>
                            </div>

                            <div class="relative pt-6 border-t border-gray-100 flex justify-between items-end">
                                <div class="space-y-2">
                                    <div class="flex items-center text-[10px] text-gray-500 font-bold">
                                        <div class="w-1.5 h-1.5 rounded-full bg-cardify-teal mr-2"></div>
                                        {{ $utilisateur->mail }}
                                    </div>
                                    <div class="flex items-center text-[10px] text-gray-500 font-bold">
                                        <div class="w-1.5 h-1.5 rounded-full bg-cardify-gold mr-2"></div>
                                        {{ $utilisateur->telephone }}
                                    </div>
                                </div>
                                <div class="w-12 h-12 bg-slate-50 border border-dashed border-gray-200 rounded-lg flex items-center justify-center text-[7px] text-gray-400 text-center leading-tight p-1 font-bold uppercase">
                                    QR Code<br>PDF Only
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-8 py-6 flex justify-between items-center border-t border-gray-100">
                    <form action="{{ route('utilisateurs.destroy', $utilisateur) }}" method="POST" onsubmit="return confirm('Confirmer la suppression définitive ?')">
                        @csrf @method('DELETE')
                        <button class="text-red-400 hover:text-red-600 text-xs font-bold uppercase tracking-widest transition">Supprimer</button>
                    </form>

                    <div class="flex space-x-3">
                        <a href="{{ route('utilisateurs.edit', $utilisateur) }}" class="btn-ghost py-2 px-4">
                            Modifier
                        </a>
                        <a href="{{ route('utilisateurs.pdf.solo', $utilisateur) }}" target="_blank" class="btn-cardify py-2 px-4">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            Imprimer
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
