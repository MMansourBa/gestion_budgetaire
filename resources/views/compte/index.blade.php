@extends('layout.template')

@section('content')
{{-- <style>
    /* Centrer le texte dans les cellules d'en-tête de tableau */
thead tr th {
    text-align: center;
}

/* Centrer le texte dans les cellules de données de tableau */
tbody tr td {
    text-align: center;
}
</style> --}}
<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">NOMENCLATURE DES COMPTES</h1>
    </div>
    <div class="col-auto">
         <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                    <form class="table-search-form row gx-1 align-items-center">
                        <div class="col-auto">
                            <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Rechercher...">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn app-btn-secondary">Rechercher</button>
                        </div>
                    </form>
                    
                </div><!--//col-->
                <div class="col-auto">                          
                    <a class="btn app-btn-secondary" href="{{ route('compte.create') }}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>
                        Ajouter un bon
                    </a>
                </div>
            </div><!--//row-->
        </div><!--//table-utilities-->
    </div><!--//col-auto-->
</div><!--//row-->
@if (Session::get('success_message'))
    <div class="alert alert-success">{{ Session::get('success_message') }}</div>
@endif

@if (Session::get('error_message'))
    <div class="alert alert-error" style="color: red"><center>{{ Session::get('error_message') }}</center></div>
@endif
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Liste des comptes par classe</div>
                <div class="card-body">
                    @foreach($comptesParCategorie as $classe => $comptesParClasse)
                        <br><h3>{{ $classe }}</h3>
                        @foreach($comptesParClasse as $categorie => $comptes)
                            <br>
                            <h4>CLASSE {{ $categorie }}</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Numéro de Compte</th>
                                            <th>Intitulé</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($comptes as $compte)
                                            <tr>
                                                <td>{{ $compte->numero_compte }}</td>
                                                <td>{{ $compte->intitules }}</td>
                                                <td class="cell">
                                                    <a class="btn-sm app-btn-secondary" href="{{ route('compte.edit', $compte->id) }}">Éditer</a>
                                                    <a class="btn-sm app-btn-secondary" href="javascript:void(0);" onclick="confirmDelete('{{ route('compte.delete', $compte->id) }}')">Supprimer</a>
                                                </td>
                                            </tr>
                                            <!-- Ajoutez ici la logique pour afficher les sous-comptes si nécessaire -->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(url) {
        if (confirm("Voulez-vous vraiment supprimer cette catégorie de dépenses ?")) {
            window.location.href = url;
        }
    }
</script>

@endsection
