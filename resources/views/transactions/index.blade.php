@extends('layout.template')

@section('content')

<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">DEPENSES</h1>
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
                    <a class="btn app-btn-secondary" href="{{ route('transaction.create') }}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>
                        Ajouter dépense
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
        @foreach ($transactionsParCategorie as $categorie => $transactions)
            <h2>{{ $categorie }}</h2>
            @foreach ($transactions->groupBy('numero_compte') as $numeroCompte => $transactionsParNumeroCompte)
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell">Numero compte</th>
                                        <th class="cell">Intitulé</th>
                                        <th class="cell">Crédits alloués</th>
                                        <th class="cell">N°</th>
                                        <th class="cell">Intitulé dépense mandaté</th>
                                        <th class="cell">Montant</th>
                                        <th class="cell">Payes</th>
                                        <th class="cell">Solde disponible</th>
                                        <th class="cell">Date</th>
                                        <th class="cell">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $firstTransaction = $transactionsParNumeroCompte->first(); @endphp
                                    <tr>
                                        <td rowspan="{{ $transactionsParNumeroCompte->count() }}" class="cell">{{ $firstTransaction->numero_compte }}</td>
                                        <td rowspan="{{ $transactionsParNumeroCompte->count() }}" class="cell">{{ $firstTransaction->intitules }}</td>
                                        <td rowspan="{{ $transactionsParNumeroCompte->count() }}" class="cell">{{ $firstTransaction->credits_alloues }} FCFA</td>
                                        @foreach ($transactionsParNumeroCompte as $transaction)
                                            <td class="cell">{{ $transaction->numero_bon }}</td>
                                            <td class="cell">{{ $transaction->intitule }}</td>
                                            <td class="cell">{{ $transaction->montant }} FCFA</td>
                                            <td class="cell">{{ $transaction->payes }}</td>
                                            <td class="cell">
                                                <?php
                                                $creditAlloue = $transaction->credits_alloues;
                                                $montantTotalTransactionsPrecedentes = $transactionsParNumeroCompte->where('id', '<=', $transaction->id)->sum('montant');
                                                $soldeDisponible = $creditAlloue - $montantTotalTransactionsPrecedentes;
                                                ?>
                                                {{ $soldeDisponible }} FCFA
                                            </td>
                                            <td class="cell">{{ $transaction->date }}</td>
                                            <td class="cell">
                                                <a class="btn-sn app-btn-secondary" href="{{ route('transaction.edit', $transaction->id) }}">Editer</a>
                                                <a class="btn-sm app-btn-secondary" href="javascript:void(0);" onclick="confirmDelete('{{ route('transaction.delete', $transaction->id) }}')">Supprimer</a>
                                            </td>
                                        </tr>
                                        @if (!$loop->last)
                                            <tr>
                                        @endif
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            @endforeach
        @endforeach
        <nav class="app-pagination">
            {{ $transactions->links() }}
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

