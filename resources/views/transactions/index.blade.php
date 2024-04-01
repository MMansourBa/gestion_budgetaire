@extends('layout.template')

@section('content')

@foreach($depenses as $depense)
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">{{ $depense->name }}</h1>
        </div>
    </div>
    @if (Session::get('success_message'))
        <div class="alert alert-success">{{ Session::get('success_message') }}</div>
    @endif

    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">#</th>
                                    <th class="cell">Intitulé</th>
                                    <th class="cell">Crédits alloués</th>
                                    <th class="cell">N°</th>
                                    <th class="cell">Intitulé dépense mandaté</th>
                                    <th class="cell">Montant</th>
                                    <th class="cell">Solde disponible</th>
                                    <th class="cell">Date</th>
                                    <th class="cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($depense->transactions as $transaction)
                                    <tr>
                                        <td class="cell">{{ $transaction->id }}</td>
                                        <td>{{ $transaction->intitule }}</td>
                                        <td class="cell">{{ $transaction->credits_alloues }} FCFA</td>
                                        <td class="cell">{{ $transaction->numero_depense }}</td>
                                        <td class="cell">{{ $transaction->titre_depense }}</td>
                                        <td class="cell">{{ $transaction->montant }}</td>
                                        <td class="cell">{{ $transaction->solde_disponible }} FCFA</td>
                                        <td class="cell">{{ $transaction->date }}</td>
                                        <td class="cell">
                                            <a class="btn-sn app-btn-secondary" href="{{ route('transaction.edit', $transaction->id) }}">Editer</a>
                                            <a class="btn-sn app-btn-secondary" href="{{ route('transaction.delete', $transaction->id) }}">Supprimer</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="cell" colspan="9"><center>Aucune transaction pour cette dépense</center></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div><!--//table-responsive-->
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        </div><!--//tab-pane-->
    </div><!--//tab-content-->
@endforeach

@endsection
