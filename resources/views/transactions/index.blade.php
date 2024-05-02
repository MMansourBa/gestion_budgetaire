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
                                        <center>
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
                                        </center>
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
                                                <a class="btn-sn app-btn-secondary" href="{{ route('transaction.edit', $transaction->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                                      </svg></a>
                                                <a class="btn-sm app-btn-secondary" href="javascript:void(0);" 
                                                onclick="confirmDelete('{{ route('transaction.delete', $transaction->id) }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                                  </svg></a>
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

