@extends('layouts.app')

@section('title', 'Documentation')

@section('content')

<div class="container">
    <h1 class="mb-4">Liste des Documentations des Applications</h1>

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

    <!-- Boutons d'action -->
    <div class="mb-3">
        <a href="{{ route('documentation.create') }}" class="btn btn-success">Ajouter une Documentation</a>
    </div>

    <!-- Vérifier si la liste est vide -->
    @if($documentations->isEmpty())
        <p>Aucune documentation n'a été ajoutée pour le moment.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Application</th>
                    <th>Titre</th>
                    <th>Fichier</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($documentations as $documentation)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $documentation->application->nom }}</td>
                        <td>{{ $documentation->titre }}</td>
                        <td>{{ $documentation->contenu }}</td>
                        <td>
                            <!-- Bouton pour voir le fichier -->
                            <a href="{{ asset('storage/' . $documentation->contenu) }}" target="_blank" class="btn btn-info btn-sm">Voir</a>

                            <!-- Bouton pour modifier la documentation -->
                            <a href="{{ route('documentation.edit', $documentation->id) }}" class="btn btn-warning btn-sm">Modifier</a>

                            <!-- Bouton pour télécharger le fichier -->
                            <a href="{{ route('documentation.download', $documentation->id) }}" class="btn btn-primary btn-sm">Télécharger</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection
