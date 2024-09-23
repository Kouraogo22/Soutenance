@extends('layouts.app')

@section('title', 'Gestion des rôles')

@section('content')
<div class="container">
    <h1 class="mb-4">Gestion des Rôles</h1>

    <!-- Notification de succès -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Bouton pour ouvrir le modal de création -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createRoleModal">
        Ajouter un Rôle
    </button>

    <!-- Tableau des rôles -->
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $role->nom }}</td>
                    <td>{{ $role->description }}</td>
                    <td>
                        <!-- Bouton Voir -->
                        <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewRoleModal" data-id="{{ $role->id }}" data-nom="{{ $role->nom }}" data-description="{{ $role->description }}" title="Voir">
                            <i class="fas fa-eye"></i>
                        </a>
                        
                        <!-- Bouton Modifier -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editRoleModal" data-id="{{ $role->id }}" data-nom="{{ $role->nom }}" data-description="{{ $role->description }}" title="Modifier">
                            <i class="fas fa-edit"></i>
                        </button>

                        <!-- Bouton Supprimer -->
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteRoleModal" data-id="{{ $role->id }}" title="Supprimer">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal de création -->
<div class="modal fade" id="createRoleModal" tabindex="-1" aria-labelledby="createRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('role.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createRoleModalLabel">Ajouter un Rôle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Créer</button>
                </div>
            </form> <!-- Balise manquante ajoutée ici -->
        </div>
    </div>
</div>

<!-- Modal pour Voir les informations d'un rôle -->
<div class="modal fade" id="viewRoleModal" tabindex="-1" aria-labelledby="viewRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewRoleModalLabel">Informations sur le Rôle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nom:</strong> <span id="roleName"></span></p>
                <p><strong>Description:</strong> <span id="roleDescription"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de modification -->
<div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editRoleForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Modifier un Rôle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_nom">Nom</label>
                        <input type="text" class="form-control" id="edit_nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_description">Description</label>
                        <input type="text" class="form-control" id="edit_description" name="description">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de suppression -->
<div class="modal fade" id="deleteRoleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="deleteRoleForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">Supprimer un Rôle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer ce rôle ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Pour le modal de modification
    $('#editRoleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id'); // Assurez-vous d'avoir un data-id sur le bouton
        var nom = button.data('nom');
        var description = button.data('description');

        var modal = $(this);
        modal.find('.modal-body #edit_nom').val(nom);
        modal.find('.modal-body #edit_description').val(description);
        modal.find('#editRoleForm').attr('action', '{{ url('/roles') }}/' + id); // Utilisation de l'URL helper
    });

    // Pour le modal de suppression
    $('#deleteRoleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id'); // Assurez-vous d'avoir un data-id sur le bouton

        var modal = $(this);
        modal.find('#deleteRoleForm').attr('action', '{{ url('/roles') }}/' + id); // Utilisation de l'URL helper
    });

    // Pour le modal de visualisation
    $('#viewRoleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Bouton qui a déclenché le modal
        var nom = button.data('nom'); // Extraire le nom
        var description = button.data('description'); // Extraire la description

        // Mettre à jour le contenu du modal
        var modal = $(this);
        modal.find('#roleName').text(nom);
        modal.find('#roleDescription').text(description);
    });
</script>
@endsection

@endsection
