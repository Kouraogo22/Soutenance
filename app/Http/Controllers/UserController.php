<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function index()
    {
        $users = User::with('roles')->get(); // Charger les utilisateurs avec leurs rôles
        $roles = Role::all(); // Charger tous les rôles
    
        return view('users.index', compact('users', 'roles')); // Passer les utilisateurs et les rôles à la vue
    }
    
    // Affiche le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Gère la logique d'authentification
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
    
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
                
            return redirect()->intended('/home')->with('status', 'Connexion réussie!');
        } else {
            return back()->withErrors([
                'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
            ])->onlyInput('email');
        }
    }
    

    // Gère la déconnexion de l'utilisateur
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function store(Request $request)
    {
    // Validation des données
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:users',
        'cuid' => 'required|string|max:255|unique:users',
        'email' => 'required|email|unique:users',
        'departement' => 'required|string|max:255',
        'password' => 'required|string|min:8|confirmed',
        'role_id' => 'required|array', // Pour les rôles
    ]);

    // Création de l'utilisateur
    $user = User::create([
        'name' => $request->name,
        'cuid' => $request->cuid,
        'email' => $request->email,
        'departement_direction' => $request->departement_direction,
        'password' => Hash::make($request->password),
    ]);

    // Attacher les rôles à l'utilisateur
    $user->roles()->attach($request->role_id);

    return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    public function show($id){
        $user = User::find($id); // Trouver l'utilisateur par ID
        $roles = $user->roles; // Récupérer les rôles associés à l'utilisateur

        return view('users.show', compact('user', 'roles')); // Passer les données à la vue
    }

}
