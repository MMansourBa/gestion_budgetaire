@extends('layout.template')

@section('content')

<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Bon d'engagement</h1>
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
                {{-- <div class="col-auto">
                    
                    <select class="form-select w-auto" >
                          <option selected value="option-1">All</option>
                          <option value="option-2">This week</option>
                          <option value="option-3">This month</option>
                          <option value="option-4">Last 3 months</option>
                          
                    </select>
                </div> --}}
                <div class="col-auto">                          
                    <a class="btn app-btn-secondary" href="{{route('bonEngagement.create')}}">
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

    <div class="alert alert-success">{{Session::get('success_message')}}</div>
    
@endif

<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                {{-- <th class="cell">#</th> --}}
                                <th class="cell">N°</th>
                                <th class="cell">DESIGNATION</th>
                                <th class="cell">PRIX UNITAIRE</th>
                                <th class="cell">QUANTITE</th>
                                <th class="cell">MONTANT TOTAL</th>
                                <th class="cell">PDF</th>
                                {{-- <th class="cell">Date</th> --}}
                                <th class="cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($bonEngagements as $bonEngagement)
                                <tr>
                                    <td class="cell">{{$bonEngagement->numero}}</td>
                                    <td class="cell">{{$bonEngagement->designation}}</td>
                                    <td class="cell">{{$bonEngagement->prix_unitaire}} FCFA</td>
                                    <td class="cell">{{$bonEngagement->qte}}</td>
                                    <td class="cell">{{$bonEngagement->prix_unitaire * $bonEngagement->qte}} FCFA</td>
                                    <td class="cell">
                                        <a class="btn-sn app-btn-secondary" href="{{ route('bonEngagement.bonPDF', $bonEngagement->id) }}">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                                <path fill-rule="evenodd" d="M7.5.5a.5.5 0 0 1 .5.5v8.793l2.146-2.147a.5.5 0 1 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7 9.293V1a.5.5 0 0 1 .5-.5z"/>
                                            </svg>
                                        </a>
                                    </td>
                                    {{-- <td class="cell">{{$bonEngagement->date}}</td> --}}
                                    <td class="cell">
                                        <a class="btn-sn app-btn-secondary" href="{{route('bonEngagement.edit', $bonEngagement->id)}}">Editer</a>
                                        <a class="btn-sm app-btn-secondary" href="javascript:void(0);"
                                         onclick="confirmDelete('{{ route('bonEngagement.delete', $bonEngagement->id) }}')">Supprimer</a>
                                    </td>
                                    {{-- <td class="cell">
                                        <a class="btn-sn app-btn-secondary" href="{{route('transaction.edit', $transaction->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M13.88 1.933a1.244 1.244 0 0 1 1.758 1.758L2.697 15.697a1.244 1.244 0 0 1-1.758-1.758L13.88 1.933zm-1.138.84l-9.563 9.563a.244.244 0 0 0-.07.108l-1.5 5a.244.244 0 0 0 .301.301l5-1.5a.244.244 0 0 0 .108-.07l9.563-9.563-3.84-3.84z"/>
                                            </svg>
                                        </a>
                                        <a class="btn-sn app-btn-secondary" href="{{route('transaction.delete', $transaction->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M3.5 5.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-.5-.5h-8zM2 5.5A1.5 1.5 0 0 1 3.5 4h8A1.5 1.5 0 0 1 13 5.5v1a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 2 6.5v-1z"/>
                                            </svg>
                                        </a>
                                    </td> --}}
                                    
                                </tr>
                            @empty
                                <tr>
                                    <td class="cell" colspan="6"><center>Aucun bon enregistre</center></td>
                                </tr>
                            @endforelse

                            
                            

                        </tbody>
                    </table>
                </div><!--//table-responsive-->
               
            </div><!--//app-card-body-->        
        </div><!--//app-card-->
        <nav class="app-pagination">
            {{ $bonEngagements->links() }}
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

