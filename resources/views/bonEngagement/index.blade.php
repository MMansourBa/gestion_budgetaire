@extends('layout.template')

@section('content')
<style>
    th, td{
        text-align: center;
    }
</style>
<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">BON D'ENGAGEMENT</h1>
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
                    <a class="btn app-btn-secondary" href="{{ route('bonEngagement.create') }}">
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
<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        @foreach ($bonsParCategorie as $categorie => $bons)
            <h2>{{ $categorie }}</h2>
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Numero compte</th>
                                    <th class="cell">Beneficiaire</th>
                                    <th class="cell">Intitulé</th>
                                    <th class="cell">Crédits alloués</th>
                                    <th class="cell">N°</th>
                                    <th class="cell">Montant</th>
                                    <th class="cell">Solde disponible</th>
                                    <th class="cell">Date</th>
                                    <th class="cell">Telecharger</th>
                                    <th class="cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bons as $bon)
                                    <tr>
                                        <td class="cell">{{ $bon->numero_compte }}</td>
                                        <td class="cell">{{ $bon->beneficiaire }}</td>
                                        <td class="cell">{{ $bon->intitules }}</td>
                                        <td class="cell">{{ $bon->credits_alloues }} FCFA</td>
                                        <td class="cell">{{ $bon->numero_bon }}</td>
                                        <td class="cell">{{ $bon->montant }}</td>
                                        <td class="cell">{{ $bon->solde_disponible }} FCFA</td>
                                        <td class="cell">{{ $bon->date }}</td>
                                        <td class="cell"><!-- Nouvelle colonne pour le téléchargement PDF -->
                                            <center><a class="btn-sm app-btn-secondary" href="{{ route('bonEngagement.bonPDF', $bon->id) }}">
                                                <i class="fa-solid fa-file-arrow-down"></i>
                                            </a></center>
                                        </td>                                                                               
                                        <td class="cell">
                                            <a class="btn-sn app-btn-secondary" href="{{ route('bonEngagement.edit', $bon->id) }}">Editer</a>
                                            <a class="btn-sm app-btn-secondary" href="javascript:void(0);" onclick="confirmDelete(
                                                '{{ route('bonEngagement.delete', $bon->id) }}')">Supprimer</a>
                                        </td>
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="cell" colspan="9"><center>Aucune dépense</center></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div><!--//table-responsive-->
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        @endforeach
        <nav class="app-pagination">
            {{ $bons->links() }}
        </nav><!--//app-pagination-->
    </div><!--//tab-pane-->
</div><!--//tab-content-->

<script>
    function confirmDelete(url) {
        if (confirm("Voulez-vous vraiment supprimer cette catégorie de dépenses ?")) {
            window.location.href = url;
        }
    }
</script>

@endsection
