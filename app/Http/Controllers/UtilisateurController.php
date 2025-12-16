<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index()
    {
        $utilisateurs = Utilisateur::all();
        return view('utilisateurs.index', compact('utilisateurs'));
    }

    public function create()
    {
        return view('utilisateurs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'initiale' => 'required|max:2',
            'prenomNom' => 'required|string|max:255',
            'fonction' => 'required|string',
            'mail' => 'required|email',
            'telephone' => 'required',
        ]);
        Utilisateur::create($validated);
        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur créé !');
    }

    public function show(Utilisateur $utilisateur)
    {
        return view('utilisateurs.show', compact('utilisateur'));
    }

    public function edit(Utilisateur $utilisateur)
    {
        return view('utilisateurs.edit', compact('utilisateur'));
    }

    public function update(Request $request, Utilisateur $utilisateur)
    {
        $validated = $request->validate([
            'initiale' => 'required|max:2',
            'prenomNom' => 'required|string|max:255',
            'fonction' => 'required|string',
            'mail' => 'required|email',
            'telephone' => 'required',
        ]);

        $utilisateur->update($validated);

        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur mis à jour avec succès !');
    }

    public function destroy(Utilisateur $utilisateur)
    {
        $utilisateur->delete();

        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur supprimé');
    }
}
