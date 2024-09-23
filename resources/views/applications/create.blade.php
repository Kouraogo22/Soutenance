@extends('layouts.app')

@section('title', 'Ajouter une application')

@section('content')

<div class="container mt-5">
   
<br>
<!-- Step bar navigation -->
<nav class="stepped-process" aria-label="Checkout process">
  <ol>
    <li class="stepped-process-item" id="step-1-nav">
      <a class="stepped-process-link" href="#" onclick="showStep(1)" title="1. Information sur l'application">Information sur l'application</a>
    </li>
    <li class="stepped-process-item" id="step-2-nav">
      <a class="stepped-process-link" href="#" onclick="showStep(2)" title="2. Version">Version</a>
    </li>
    <li class="stepped-process-item" id="step-3-nav">
      <a class="stepped-process-link" href="#" onclick="showStep(3)" title="3. Personne ressource">Personne ressource</a>
    </li>
    <li class="stepped-process-item" id="step-4-nav">
      <a class="stepped-process-link" href="#" onclick="showStep(4)" title="4. Structure de développement">Structure de développement</a>
    </li>
    <li class="stepped-process-item" id="step-5-nav">
      <a class="stepped-process-link" href="#" onclick="showStep(5)" title="5. Documentation">Documentation</a>
    </li>
  </ol>
</nav>
<br>

<!-- Étape 1: Information sur l'application -->
<form id="step-1-form" method="POST" action="{{ route('app.store') }}" style="display: block;">
  @csrf
  <h3>Information sur l'application</h3>
  <!-- Nom de l'application -->
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
  <h3>Version</h3>
  <input type="hidden" id="application_id" name="application_id" required>
  <!-- Numéro de version -->
  <div class="mb-3">
    <label for="numero_version" class="form-label">Numéro de version</label>
    <input type="text" class="form-control" id="numero_version" name="numero_version" value="{{ old('numero_version') }}" required>
  </div>

  <!-- Date de sortie -->
  <div class="mb-3">
    <label for="date_sortie" class="form-label">Date de sortie</label>
    <input type="date" class="form-control" id="date_sortie" name="date_sortie" value="{{ old('date_sortie') }}" required>
  </div>

  <!-- Outils utilisés -->
  <div class="mb-3">
    <label for="outils_utilise" class="form-label">Outils utilisés</label>
    <input type="text" class="form-control" id="outils_utilise" name="outils_utilise" value="{{ old('outils_utilise') }}" required>
  </div>

  <!-- Contact de mise à jour -->
  <div class="mb-3">
    <label for="contact_MAJ" class="form-label">Contact pour la mise à jour</label>
    <input type="text" class="form-control" id="contact_MAJ" name="contact_MAJ" value="{{ old('contact_MAJ') }}" required>
  </div>

  <!-- Type de serveur -->
  <div class="mb-3">
    <label for="serveur_type" class="form-label">Type de serveur</label>
    <input type="text" class="form-control" id="serveur_type" name="serveur_type" value="{{ old('serveur_type') }}" required>
  </div>

  <!-- Système d'exploitation du serveur -->
  <div class="mb-3">
    <label for="os_type" class="form-label">Système d'exploitation du serveur</label>
    <input type="text" class="form-control" id="os_type" name="os_type" value="{{ old('os_type') }}" required>
  </div>

  <button type="submit" class="btn btn-primary">Enregistrer et continuer</button>
</form>

<!-- Étape 3: Personne ressource -->
<form id="step-3-form" method="POST" action="{{ route('proprietaire.store') }}" style="display: none;">
  @csrf
  <h3>Personne ressource</h3>
  <input type="hidden" id="application_id" name="application_id" value="{{ old('application_id') }}" required>

  <div class="mb-3">
    <label for="nom" class="form-label">Nom de la personne ressource</label>
    <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email de la personne ressource</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
  </div>

  <div class="mb-3">
    <label for="telephone" class="form-label">Téléphone de la personne ressource</label>
    <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
  </div>

  <div class="mb-3">
    <label for="adress" class="form-label">Adressede la personne ressource</label>
    <input type="text" class="form-control" id="adress" name="adress" value="{{ old('adress') }}" required>
  </div>

  <div class="mb-3">
    <label for="organisation" class="form-label">Organisation de la personne ressource</label>
    <input type="text" class="form-control" id="organisation" name="organisation" value="{{ old('organisation') }}" required>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer et continuer</button>
</form>

<!-- Étape 4: Structure de développement -->
<form id="step-4-form" method="POST" action="{{ route('structure.store') }}" style="display: none;">
  @csrf
  <h3>Structure de développement</h3>
  <input type="hidden" id="application_id" name="application_id" value="{{ old('application_id') }}" required>

  <div class="mb-3">
    <label for="type" class="form-label">Type de Structure</label>
    <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}" required>
  </div>

  <div class="mb-3">
    <label for="responsable" class="form-label">Responsable</label>
    <input type="text" class="form-control" id="responsable" name="responsable" value="{{ old('responsable') }}" required>
  </div>

  <div class="mb-3">
    <label for="email_respons" class="form-label">Email Responsable</label>
    <input type="email" class="form-control" id="email_respons" name="email_respons" value="{{ old('email_respons') }}" required>
  </div>

  <div class="mb-3">
    <label for="contact_respons" class="form-label">Contact Responsable</label>
    <input type="text" class="form-control" id="contact_respons" name="contact_respons" value="{{ old('contact_respons') }}" required>
  </div>

  <div class="mb-3">
    <label for="budget" class="form-label">Budget</label>
    <input type="text" class="form-control" id="budget" name="budget" value="{{ old('budget') }}" required>
  </div>

  <!-- Autres champs pour la structure de développement -->
  <button type="submit" class="btn btn-primary">Enregistrer et continuer</button>
</form>

<!-- Étape 5: Documentation -->
<form id="step-5-form" method="POST" action="{{ route('documentation.store') }}" enctype="multipart/form-data" style="display: none;">
  @csrf
  <h3>Documentation</h3>
  <input type="hidden" id="application_id" name="application_id" value="{{ old('application_id') }}" required>

    <div class="mb-3">
      <label for="titre" class="form-label">Titre de la Documentation</label>
      <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre') }}" required>
    </div>

    <div class="mb-3">
      <label for="contenu" class="form-label">Télécharger la Documentation</label>
      <input type="file" class="form-control" id="contenu" name="contenu" accept=".pdf,.doc,.docx" required>
    </div>
  <!-- Autres champs pour la documentation -->
   
  <button type="submit" class="btn btn-success">Soumettre</button>
</form>

</div>
@endsection
