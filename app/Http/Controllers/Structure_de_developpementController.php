<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Structure_de_developpement;


class Structure_de_developpementController extends Controller
{
    // Afficher la liste des structures de développement
    public function index()
    {
        $structures = Structure_de_developpement::all();
        return view('structures.index', compact('structures'));
    }

    // Afficher le formulaire de création d'une nouvelle structure de développement
    public function create()
    {
        return view('structures.create');
    }

    // Enregistrer une nouvelle structure de développement
    public function store(Request $request)
    {
        $request->validate([
            'application_id' => 'required|exists:application,id',
            'type' => 'required|string',
            'responsable' => 'required|string',
            'email_respons' => 'required|email',
            'contact_respons' => 'required|string',
            'budget' => 'required|string',
        ]);

        Structure_de_developpement::create($request->all());

        return redirect()->route('structures.index')->with('success', 'Structure de développement créée avec succès.');
    }

    // Afficher les détails d'une structure de développement spécifique
    public function show(Structure_de_developpement $structure)
    {
        $structure = Structure::findOrFail($id);
        return view('structures.show', compact('structure'));
    }

    // Afficher le formulaire de modification d'une structure de développement existante
    public function edit(Structure_de_developpement $structure)
    {
        $structure = Structure::findOrFail($id);
        return view('structures.edit', compact('structure'));
    }

    // Mettre à jour une structure de développement existante
    public function update(Request $request, Structure_de_developpement $structure)
    {
        $request->validate([
            'application_id' => 'required|exists:application,id',
            'type' => 'required|string',
            'responsable' => 'required|string',
            'email_respons' => 'required|email',
            'contact_respons' => 'required|string',
            'budget' => 'required|string',
        ]);

        $structure->update($request->all());

        return redirect()->route('structures.index')->with('success', 'Structure de développement mise à jour avec succès.');
    }

    // Supprimer une structure de développement
    public function destroy(Structure_de_developpement $structure)
    {
        $structure->delete();
        return redirect()->route('structures.index')->with('success', 'Structure de développement supprimée avec succès.');
    }
}
