@extends('layouts.app')

@section('title', 'Création d'utilisateur')

@section('content')

    <div class="container">
        <h1>Gestion des Utilisateurs</h1>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
            Ajouter un Utilisateur
        </button>

        <!-- Modal -->
        <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createUserModalLabel">Créer un Utilisateur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="cuid" class="form-label">CUID</label>
                                <input type="text" class="form-control" id="cuid" name="cuid" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="departement" class="form-label">Département</label>
                                <input type="text" class="form-control" id="departement" name="departement" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de Passe</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmation du Mot de Passe</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                            <div class="mb-3">
                                <label for="role_id" class="form-label">Rôles</label>
                                <select multiple class="form-control" id="role_id" name="role_id[]">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Créer Utilisateur</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Table des utilisateurs -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>CUID</th>
                    <th>Email</th>
                    <th>Département</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->cuid }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->departement_direction }}</td>
                        <td>{{ $user->role_id }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection
