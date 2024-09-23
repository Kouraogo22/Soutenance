@extends('layouts.app')

@section('title', 'Strutures de développement')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des Structures de Développement</h1>

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

    <!-- Vérification si la liste est vide -->
    @if($structures->isEmpty())
        <p>Aucune structure de développement n'a été ajoutée pour le moment.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Application</th>
                    <th>Type</th>
                    <th>Responsable</th>
                    <th>Email Responsable</th>
                    <th>Contact Responsable</th>
                    <th>Budget</th>
                    <th>Actions</th> <!-- Nouvelle colonne pour les actions -->
                </tr>
            </thead>
            <tbody>
                @foreach($structures as $structure)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $structure->application->nom }}</td>
                        <td>{{ $structure->type }}</td>
                        <td>{{ $structure->responsable }}</td>
                        <td>{{ $structure->email_respons }}</td>
                        <td>{{ $structure->contact_respons }}</td>
                        <td>{{ $structure->budget }}</td>
                        <td>
                            <!-- Bouton pour voir la structure -->
                            <a href="{{ route('structure.show', $structure->id) }}" class="btn btn-info btn-sm">Voir</a>

                            <!-- Bouton pour modifier la structure -->
                            <a href="{{ route('structure.edit', $structure->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

