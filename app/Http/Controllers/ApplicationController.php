<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;


class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all();
        return view('applications.index', compact('applications'));
    }

    public function create()
    {
        return view('applications.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'serveurhote' => 'required|max:255',
            'type' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'etat' => 'required|string|max:255',
            'langage_dev' => 'required|string|max:255',
            'date_modif' => 'required|date|max:255',
            'date_lancement' => 'required|date|max:255',
        ]);

        $userId = auth::id();
        $validatedData['user_id'] = $userId;

        // Créer l'application avec les données validées
        $application = Application::create($validatedData);

        // Rediriger avec succès ou renvoyer une réponse JSON
        return response()->json([
            'success' => true,
            'application_id' => $application->id,
        ]);

    }

    public function show(Application $application)
    {
        // Récupérer toutes les applications avec leurs relations
        $applications = Application::with('versions', 'proprietaire', 'structure_de_developpement', 'documentation')->get();
    
        // Passer la liste des applications à la vue
        return view('applications.show', compact('applications'));
    }
    

    public function edit(Application $application)
    {
        return view('applications.edit', compact('application'));
    }

    public function update(Request $request, Application $application)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'serveurhote' => 'required|max:255',
            'type' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'etat' => 'required|string|max:255',
            'langage_dev' => 'required|string|max:255',
            'date_modif' => 'required|date|max:255',
            'date_lancement' => 'required|date|max:255',
        ]);

        $application->update($validatedData);

        return redirect()->route('applications.index');
    }
}
