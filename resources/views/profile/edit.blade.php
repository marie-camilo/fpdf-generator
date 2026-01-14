<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-cardify-dark leading-tight">
            {{ __('Paramètres du Profil') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="p-4 sm:p-8 bg-white shadow-sm border-l-4 border-cardify-teal sm:rounded-xl">
                <div class="max-w-xl">
                    <h3 class="text-lg font-bold text-cardify-dark mb-1">Informations personnelles</h3>
                    <p class="text-sm text-gray-500 mb-6">Mettez à jour les informations de votre compte et votre adresse e-mail.</p>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow-sm border-l-4 border-cardify-gold sm:rounded-xl">
                <div class="max-w-xl">
                    <h3 class="text-lg font-bold text-cardify-dark mb-1">Sécurité</h3>
                    <p class="text-sm text-gray-500 mb-6">Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester en sécurité.</p>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow-sm border-l-4 border-red-500 sm:rounded-xl">
                <div class="max-w-xl">
                    <h3 class="text-lg font-bold text-red-600 mb-1">Zone de danger</h3>
                    <p class="text-sm text-gray-500 mb-6">Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées.</p>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
