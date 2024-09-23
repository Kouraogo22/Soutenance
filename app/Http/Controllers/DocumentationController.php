<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentation;


class DocumentationController extends Controller
{
    public function index()
    {
        // Récupérer toutes les documentations avec leur application associée
        $documentations = Documentation::with('application')->get();

        // Envoyer les documentations à la vue
        return view('documentation.index', compact('documentations'));
    }

    public function create()
    {
        return view('documentation.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'application_id' => 'required|exists:applications,id',
            'titre' => 'required|max:255',
            'contenu' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);
    
        // Enregistrer la documentation
        // Vous devez d'abord gérer le téléchargement du fichier
        if ($request->hasFile('contenu')) {
            $file = $request->file('contenu');
            $path = $file->store('public/documentations'); // Stockage dans le répertoire 'documentations'
            $validatedData['contenu'] = $path;
        }
    
        // Assurez-vous d'avoir un modèle et une table pour la documentation
        Documentation::create($validatedData);
    
    }

    public function download($id)
    {
        $documentation = Documentation::findOrFail($id);
        $filePath = storage_path('app/public/' . $documentation->contenu);

        return response()->download($filePath);
    }

    

    public function show(Documentation $documentation)
    {
        $documentation = Documentation::findOrFail($id);
        return view('documentations.show', compact('documentation'));
    }

    public function edit(Documentation $documentation)
    {
        $documentation = Documentation::findOrFail($id);
        return view('documentations.edit', compact('documentation'));
    }

    public function update(Request $request, Documentation $documentation)
    {
        $validatedData = $request->validate([
            'application_id' => 'required|exists:applications,id',
            'titre' => 'required|max:255',
            'contenu' => 'nullable|file|mimes:pdf,doc,docx|max:2048' // Fichier facultatif lors de la mise à jour
        ]);
    
        // Si un nouveau fichier est téléchargé
        if ($request->hasFile('contenu')) {
            $file = $request->file('contenu');
            $filePath = $file->store('documentations'); // Enregistrer le nouveau fichier
    
            // Ajouter le chemin du fichier au tableau de données validées
            $validatedData['contenu'] = $filePath;
    
            // Supprimer l'ancien fichier si nécessaire
            if ($documentation->contenu) {
                Storage::delete($documentation->contenu); // Assure-toi que le fichier précédent est supprimé
            }
        }
    
        // Mise à jour de la documentation
        $documentation->update($validatedData);
    
        return redirect()->route('documentation.index');
    }
    
}
