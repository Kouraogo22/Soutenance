<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;


class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);
    
        Role::create([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);
    
        return redirect()->route('role.index')->with('success', 'Rôle créé avec succès.');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.show', compact('role'));    
    }

    public function edit($id)
    {
           // Récupérer le rôle par son ID
            $role = Role::find($id);

            // Vérifiez si le rôle existe
            if (!$role) {
                return redirect()->route('role.index')->withErrors('Rôle non trouvé');
            }

            // Passer le rôle à la vue
            return view('roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);
    
        $role = Role::findOrFail($id);
        $role->update($request->all());
    
        return redirect()->route('roles.index')->with('success', 'Rôle modifié avec succès.');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
    
        return redirect()->route('role.index')->with('success', 'Rôle supprimé avec succès.');
    }
}
