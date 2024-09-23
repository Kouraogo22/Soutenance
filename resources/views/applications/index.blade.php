@extends('layouts.app')

@section('title', 'Liste des applications')

@section('content')
<div class="container mt-5">
  <h2 class=" table-header mb-4">Liste des applications</h2>

  <div class="d-flex justify-content-between align-items-center">
    <div class="d-flex">
      <input type="text" class="form-control me-2" placeholder="Rechercher" id="search">
      <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#formModal">Nouveau</button>
    </div>
  </div>

  <table class="table table-striped">
  <div class="quantity-selector">
    <input type="number" id="inputQuantitySelector" class="form-control" aria-live="polite" data-bs-step="counter" name="quantity" title="quantity" value="0" min="0" max="10" step="1" data-bs-round="0" aria-label="Quantity selector">
    <button type="button" class="btn btn-icon btn-outline-secondary" aria-describedby="inputQuantitySelector" data-bs-step="down">
      <span class="visually-hidden">Step down</span>
    </button>
    <button type="button" class="btn btn-icon btn-outline-secondary" aria-describedby="inputQuantitySelector" data-bs-step="up">
      <span class="visually-hidden">Step up</span>
    </button>
  </div>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom de l'application</th>
        <th scope="col">Version</th>
        <th scope="col">Propriétaire</th>
        <th scope="col">Structure de développement</th>
        <th scope="col">Documentation</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($applications as $application)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $application->nom }}</td>
        <td>
          @foreach($application->versions as $version)
            {{ $version->numero_version }} 
            @if(!$loop->last), @endif
          @endforeach
        </td>
        <td>{{ $application->proprietaire->nom }}</td>
        <td>{{ $application->structure_de_developpement->type }}</td>
        <td>
          @if($application->documentation)
            <a href="{{ asset('storage/' . $application->documentation->fichier) }}" target="_blank">Voir le fichier</a>
          @else
            Aucune documentation
          @endif
        </td>
        <td>
          <a href="{{ route('application.show', $application->id) }}" class="btn btn-info btn-sm">Voir</a>
          <a href="{{ route('application.edit', $application->id) }}" class="btn btn-warning btn-sm">Modifier</a>
          <form action="{{ route('application.destroy', $application->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Voulez-vous vraiment supprimer cette application ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>









<!-- Modal structure -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Ajouter une nouvelle application</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="loading-spinner" class="spinner-border text-primary" role="status" style="display: none;">
          <span class="visually-hidden">Loading...</span>
      </div>
        <!-- Step bar navigation -->
        <nav class="stepped-process" aria-label="Checkout process">
          <ol>
            <li class="stepped-process-item active" id="step-1-nav">
              <a class="stepped-process-link" href="#" onclick="showStep(1)" title="1. Information sur l'application">Information sur l'application</a>
            </li>
            <li class="stepped-process-item disabled" id="step-2-nav">
              <a class="stepped-process-link" href="#" onclick="showStep(2)" title="2. Version">Version</a>
            </li>
            <li class="stepped-process-item disabled" id="step-3-nav">
              <a class="stepped-process-link" href="#" onclick="showStep(3)" title="3. Personne ressource">Personne ressource</a>
            </li>
            <li class="stepped-process-item disabled" id="step-4-nav">
              <a class="stepped-process-link" href="#" onclick="showStep(4)" title="4. Structure de développement">Structure de développement</a>
            </li>
            <li class="stepped-process-item disabled" id="step-5-nav">
              <a class="stepped-process-link" href="#" onclick="showStep(5)" title="5. Documentation">Documentation</a>
            </li>
          </ol>
        </nav>

        <!-- Étape 1: Information sur l'application -->
        <form id="step-1-form" method="POST" action="{{ route('app.store') }}" style="display: block;">
          @csrf
          <!-- Form content for Step 1 -->
          <div class="mb-3">
            <label for="nom" class="form-label">Nom de l'application</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required maxlength="255">
          </div>
          <div class="mb-3">
            <label for="serveurhote" class="form-label">Serveur d'hebergement</label>
            <input type="text" class="form-control" id="serveurhote" name="serveurhote" value="{{ old('serveurhote') }}" required maxlength="255">
          </div>
          <!-- Type de l'application -->
          <div class="mb-3">
            <label for="type" class="form-label">Type *</label>
            <select class="form-select" id="type" name="type" value="{{ old('type') }}" required>
              <option value="" disabled selected>Choisir un type</option>
              <option value="web">Web</option>
              <option value="mobile">Mobile</option>
            </select>
          </div>

          <!-- Catégorie de l'application -->
          <div class="mb-3">
            <label for="categorie" class="form-label">Catégorie *</label>
            <select class="form-select" id="categorie" name="categorie" value="{{ old('categorie') }}" required>
              <option value="" disabled selected>Choisir une catégorie</option>
              <option value="gestion">Gestion</option>
              <option value="productivite">Productivité</option>
              <option value="production">Production</option>
              <option value="communication">Communication</option>
              <option value="finance">Financières</option>
              <option value="education">Éducatives</option>
              <option value="ecommerce">e-Commerce</option>
              <option value="securite">Sécurité</option>
              <option value="donnees">Analyse de donnée</option>
            </select>
          </div>

          <!-- État de l'application -->
          <div class="mb-3">
            <label for="etat" class="form-label">État *</label>
            <select class="form-select" id="etat" name="etat" required>
              <option value="" disabled selected>Choisir un état</option>
              <option value="actif">Actif</option>
              <option value="inactif">Inactif</option>
            </select>
          </div>

          <!-- Langage de développement -->
          <div class="mb-3">
            <label for="langage_dev" class="form-label">Langage de Développement *</label>
            <select class="form-select" id="langage_dev" name="langage_dev" value="{{ old('langage_dev') }}" required>
              <option value="" disabled selected>Choisir un langage de développement</option>
              <option value="python">Python</option>
              <option value="java">Java</option>
              <option value="c">C</option>
              <option value="cpp">C++</option>
              <option value="csharp">C#</option>
              <option value="javascript">JavaScript</option>
              <option value="ruby">Ruby</option>
              <option value="php">PHP</option>
              <option value="swift">Swift</option>
              <option value="kotlin">Kotlin</option>
              <option value="go">Go (Golang)</option>
              <option value="html">HTML</option>
              <option value="css">CSS</option>
              <option value="typescript">TypeScript</option>
              <option value="sass">Sass</option>
              <option value="less">LESS</option>
              <option value="assembly">Assembly</option>
              <option value="ada">Ada</option>
              <option value="rust">Rust</option>
              <option value="dart">Dart</option>
              <option value="objective-c">Objective-C</option>
              <option value="sql">SQL</option>
              <option value="plsql">PL/SQL</option>
              <option value="haskell">Haskell</option>
              <option value="erlang">Erlang</option>
              <option value="r">R</option>
              <option value="matlab">MATLAB</option>
              <option value="perl">Perl</option>
              <option value="shell">Shell (Bash)</option>
              <option value="prolog">Prolog</option>
              <option value="scheme">Scheme</option>
            </select>
          </div>

          <!-- Date de modification -->
          <div class="mb-3">
            <label for="date_modif" class="form-label">Date de dernière modification</label>
            <input type="date" class="form-control" id="date_modif" name="date_modif" value="{{ old('date_modif') }}" required>
          </div>

          <!-- Date de lancement -->
          <div class="mb-3">
            <label for="date_lancement" class="form-label">Date de lancement de l'application</label>
            <input type="date" class="form-control" id="date_lancement" name="date_lancement" value="{{ old('date_lancement') }}" required>
          </div>


          <!-- Autres champs pour l'information sur l'application -->
          <button type="submit" class="btn btn-primary">Enregistrer et continuer</button>
        </form>

        <!-- Étape 2: Version -->
        <form id="step-2-form" method="POST" action="{{ route('version.store') }}" style="display: none;">
          @csrf
          <!-- Form content for Step 2 -->
		  <input type="hidden" id="application_id" name="application_id" required>

        </form>

        <!-- Étape 3: Personne ressource -->
        <form id="step-3-form" method="POST" action="{{ route('proprietaire.store') }}" style="display: none;">
          @csrf
          <!-- Form content for Step 3 -->
		  <input type="hidden" id="application_id" name="application_id" required>

        </form>

        <!-- Étape 4: Structure de développement -->
        <form id="step-4-form" method="POST" action="{{ route('structure.store') }}" style="display: none;">
          @csrf
          <!-- Form content for Step 4 -->
		  <input type="hidden" id="application_id" name="application_id" required>

        </form>

        <!-- Étape 5: Documentation -->
        <form id="step-5-form" method="POST" action="{{ route('documentation.store') }}" style="display: none;">
          @csrf
          <!-- Form content for Step 5 -->
		  <input type="hidden" id="application_id" name="application_id" required>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>


<script>
$(document).ready(function () {
    // Configurer AJAX pour inclure le token CSRF
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Fonction pour afficher la bonne étape du formulaire
    function showStep(step) {
        $('#step-1-form, #step-2-form, #step-3-form, #step-4-form, #step-5-form').hide();
        $('#step-' + step + '-form').show();
        $('.stepped-process-item').removeClass('active');
        $('#step-' + step + '-nav').addClass('active');
    }

    // Soumission des formulaires avec gestion AJAX
    $('#step-1-form, #step-2-form, #step-3-form, #step-4-form, #step-5-form').on('submit', function (e) {
        e.preventDefault(); // Empêche la soumission classique du formulaire
        var step = $(this).attr('id').split('-')[1]; // Récupérer le numéro de l'étape
        var formData = $(this).serialize(); // Sérialiser les données du formulaire

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'), // URL pour envoyer les données
            data: formData,
            success: function (response) {
                // Vérifier si la réponse indique un succès
                if (response.success) {
                    // Mettre à jour l'ID de l'application dès la première étape
                    if (step === '1') {
                        $('#application_id').val(response.application_id); // Assigner l'ID d'application
                    }

                    // Passer à l'étape suivante si ce n'est pas la dernière étape
                    if (step < 5) {
                        showStep(parseInt(step) + 1);
                    } else {
                        alert('Application ajoutée avec succès !');
                        $('#formModal').modal('hide'); // Fermer le modal après la dernière étape
                    }
                } else {
                    alert('Erreur : ' + response.message);
                }
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                if (errors) {
                    let errorMessage = '';
                    $.each(errors, function (key, value) {
                        errorMessage += value[0] + '\n'; // Récupérer les messages d'erreur
                    });
                    alert('Erreur :\n' + errorMessage);
                } else {
                    alert('Erreur lors de l\'enregistrement des données. Veuillez vérifier les informations.');
                }
            }
        });
    });

    // Afficher la première étape par défaut
    showStep(1);
});
</script>
@endsection
