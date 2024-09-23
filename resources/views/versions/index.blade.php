@extends('layouts.app')

@section('title', 'Gestions des versions')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des Versions des Applications</h1>

    <!-- Notifications de succès ou d'erreur -->
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

    <!-- Vérification si la liste des versions est vide -->
    @if($versions->isEmpty())
        <p>Aucune version n'a été ajoutée pour le moment.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Application</th>
                    <th>Numéro de Version</th>
                    <th>Date de Sortie</th>
                    <th>Outils Utilisés</th>
                    <th>Contact MAJ</th>
                    <th>Serveur Type</th>
                    <th>OS Type</th>
                    <th>Actions</th> <!-- Nouvelle colonne pour les actions -->
                </tr>
            </thead>
            <tbody>
                @foreach($versions as $version)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $version->application->nom }}</td>
                        <td>{{ $version->numero_version }}</td>
                        <td>{{ $version->date_sortie }}</td>
                        <td>{{ $version->outils_utilise }}</td>
                        <td>{{ $version->contact_MAJ }}</td>
                        <td>{{ $version->serveur_type }}</td>
                        <td>{{ $version->os_type }}</td>
                        <td>
                            <!-- Bouton pour voir la version -->
                            <a href="{{ route('version.show', $version->id) }}" class="btn btn-info btn-sm">Voir</a>

                            <!-- Bouton pour modifier la version -->
                            <a href="{{ route('version.edit', $version->id) }}" class="btn btn-warning btn-sm">Modifier</a>

                            <!-- Bouton pour supprimer la version -->
                            <form action="{{ route('version.destroy', $version->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette version ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
 
@endsection
