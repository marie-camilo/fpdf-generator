<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-cardify-dark leading-tight">
                {{ __('Gestion des Utilisateurs') }}
            </h2>
            <a href="{{ route('utilisateurs.create') }}" class="btn-cardify">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Ajouter un employé
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-6 p-4 bg-white border-l-4 border-cardify-teal shadow-sm rounded-r-lg flex items-center">
                    <svg class="w-5 h-5 text-cardify-teal mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-sm font-medium text-gray-700">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <table class="min-w-full divide-y divide-gray-100">
                    <thead class="bg-gray-50/50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">Employé</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">Fonction</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">Contact</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-400 uppercase tracking-widest">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-50">
                    @foreach($utilisateurs as $u)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-cardify-dark rounded-xl flex items-center justify-center font-bold text-white shadow-sm">
                                        {{ $u->initiale }}
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-bold text-cardify-dark">{{ $u->prenomNom }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-cardify-teal">
                                {{ $u->fonction }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex items-center">
                                    <span class="text-gray-300 mr-2 text-[10px]">@</span> {{ $u->mail }}
                                </div>
                                <div class="flex items-center mt-1">
                                    <span class="text-gray-300 mr-2 text-[10px]">T</span> {{ $u->telephone }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-bold space-x-3">
                                <a href="{{ route('utilisateurs.show', $u) }}" class="text-cardify-dark hover:text-cardify-teal transition">Voir</a>
                                <a href="{{ route('utilisateurs.edit', $u) }}" class="text-cardify-teal hover:text-cardify-light transition">Modifier</a>
                                <form action="{{ route('utilisateurs.destroy', $u) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Supprimer cet utilisateur ?')" class="text-red-400 hover:text-red-600 transition outline-none">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @if($utilisateurs->isEmpty())
                    <div class="py-12 text-center">
                        <p class="text-gray-400">Aucun employé enregistré pour le moment.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
