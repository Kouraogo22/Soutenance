<?php

namespace App\Http\Controllers;

use App\Models\Version;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    public function index()
    {
        // Récupérer toutes les versions avec leur application associée
        $versions = Version::with('application')->get();

        // Envoyer les versions à la vue
        return view('versions.index', compact('versions'));
    }

    public function create()
    {
        return view('versions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'application_id' => 'required|exists:applications,id',
            'numero_version' => 'required',
            'date_sortie' => 'required|date',
            'outils_utilise' => 'required|string',
            'contact_MAJ' => 'required|string',
            'serveur_type' => 'required|string',
            'os_type' => 'required|string',
        ]);

        Version::create($validatedData);

        return redirect()->route('versions.index');
    }

    public function show(Version $version)
    {
        $version = Version::findOrFail($id);
        return view('versions.show', compact('version'));
    }

    public function edit(Version $version)
    {
        $version = Version::findOrFail($id);
        return view('versions.edit', compact('version'));
    }

    public function update(Request $request, Version $version)
    {
        $validatedData = $request->validate([
            'application_id' => 'required|exists:applications,id',
            'numero_version' => 'required',
            'date_sortie' => 'required|date',
            'outils_utilise' => 'required|string',
            'contact_MAJ' => 'required|string',
            'serveur_type' => 'required|string',
            'os_type' => 'required|string',
        ]);

        $version->update($validatedData);

        return redirect()->route('versions.index');
    }

    public function destroy(Version $version)
    {
        $version = Version::findOrFail($id);
        $version->delete();
        return redirect()->route('version.index')->with('success', 'Version supprimée avec succès.');
    }
}
