@extends('layouts.app')

@section('title', 'Personne ressources')

@section('content')

<div class="container">
    <h1 class="mb-4">Liste des Propriétaires</h1>

    <!-- Notification pour le succès ou l'échec d'une action -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Vérifier si la liste est vide -->
    @if($proprietaires->isEmpty())
        <p>Aucun propriétaire n'a été ajouté pour le moment.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Organisation</th>
                    <th>Actions</th> <!-- Nouvelle colonne pour les actions -->
                </tr>
            </thead>
            <tbody>
                @foreach($proprietaires as $proprietaire)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $proprietaire->nom }}</td>
                        <td>{{ $proprietaire->email }}</td>
                        <td>{{ $proprietaire->telephone }}</td>
                        <td>{{ $proprietaire->adresse }}</td>
                        <td>{{ $proprietaire->organisation }}</td>
                        <td>
                            <!-- Bouton pour voir le propriétaire -->
                            <a href="{{ route('proprietaire.show', $proprietaire->id) }}" class="btn btn-info btn-sm">Voir</a>
                            
                            <!-- Bouton pour modifier le propriétaire -->
                            <a href="{{ route('proprietaire.edit', $proprietaire->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection



