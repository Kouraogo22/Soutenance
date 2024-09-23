<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proprietaire;

class ProprietaireController extends Controller
{
    // Afficher la liste des propriétaires
    public function index()
    {
        // Récupérer tous les propriétaires
        $proprietaires = Proprietaire::all();

        // Envoyer les propriétaires à la vue
        return view('proprietaires.index', compact('proprietaires'));
    }

    // Afficher le formulaire de création d'un nouveau propriétaire
    public function create()
    {
        return view('proprietaires.create');
    }

    // Enregistrer un nouveau propriétaire
    public function store(Request $request)
    {
        $request->validate([
            'application_id' => 'required|exists:application,id',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:proprietaires',
            'telephone' => 'required|string',
            'adresse' => 'required|string',
            'organisation' => 'required|string',
        ]); 

        Proprietaire::create($request->all());
    }

    // Afficher les détails d'un propriétaire spécifique
    public function show(Proprietaire $proprietaire)
    {
        $proprietaire = Proprietaire::findOrFail($id);
        return view('proprietaires.show', compact('proprietaire'));
    }

    // Afficher le formulaire de modification d'un propriétaire existant
    public function edit(Proprietaire $proprietaire)
    {
        $proprietaire = Proprietaire::findOrFail($id);
        return view('proprietaires.edit', compact('proprietaire'));
    }

    // Mettre à jour un propriétaire existant
    public function update(Request $request, Proprietaire $proprietaire)
    {
        $request->validate([
            'application_id' => 'required|exists:application,id',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:proprietaires',
            'telephone' => 'required|string',
            'adresse' => 'required|string',
            'organisation' => 'required|string',
        ]);

        $proprietaire->update($request->all());

        return redirect()->route('proprietaires.index')->with('success', 'Propriétaire mis à jour avec succès.');
    }

    // Supprimer un propriétaire
    public function destroy(Proprietaire $proprietaire)
    {
        $proprietaire->delete();
        return redirect()->route('proprietaires.index')->with('success', 'Propriétaire supprimé avec succès.');
    }
}
