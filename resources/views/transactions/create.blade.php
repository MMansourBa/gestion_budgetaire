@extends('layout.template')

@section('content')

<style>
	select#numero_compte {
    font-size: 1000px; /* Modifier la taille de la police selon vos besoins */
}
</style>



<h1 class="app-page-title">DEPENSES</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Ajout</h3>
		                <div class="section-intro">Ajouter ici une nouvelle dépense</div>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <div class="app-card-body">
							    <form class="settings-form" method="POST" action="{{route('transaction.store')}}">
                                    @csrf
                                    @method('POST')

                                    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Catégorie</label>
                                        <select name="depense_id" id="depense_id" class="form-control">
											<option value=""></option>
											@foreach ($depenses as $depense)
												<option value="{{$depense->id}}">{{$depense->name}}</option>
											@endforeach
                                        </select>

										@error('depense_id')
											<div class="text-danger">{{$message}}</div>
										@enderror

									</div>

								    <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Numéro compte<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
										</label>
									    <select name="numero_compte" id="numero_compte" class="form-control" >
											<option value=""></option>
											@foreach ($comptes as $compte)
												<option value="{{$compte->numero_compte}}">{{$compte->numero_compte}}</option>
											@endforeach
                                        </select>

										@error('numero_compte')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
									<div class="mb-3">
									    <label for="setting-input-2" class="form-label">Intitulé</label>
									    <select name="intitules" id="intitules" class="form-control">
											<option value=""></option>
											@foreach ($comptes as $compte)
												<option value="{{$compte->intitules}}">{{$compte->intitules}}</option>
											@endforeach
                                        </select>
										@error('intitules')
											<div class="text-danger">{{$message}}</div>
										@enderror
										
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Crédits alloués</label>
									    <select name="credits_alloues" id="credits_alloues" class="form-control">
											<option value=""></option>
											@foreach ($budgets as $budget)
												<option value="{{$budget->credits_alloues}}">{{$budget->credits_alloues}}</option>
											@endforeach
                                        </select>
										@error('credits_alloues')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Nº</label>
									    <input type="number" class="form-control" id="setting-input-3" name="numero_bon" placeholder="Nº" value="{{old('numero_bon')}}">
										@error('numero_bon')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Intitulé dépense mandatée</label>
									    <input type="text" class="form-control" id="setting-input-3" name="intitule" placeholder="Intitulé" value="{{old('intitule')}}">
										@error('intitule')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
									<div class="mb-3">
									    <label for="setting-input-3" class="form-label">Montant</label>
									    <input type="number" class="form-control" id="setting-input-3" name="montant" placeholder="montant" value="{{old('montant')}}">
										@error('montant')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
									<div class="mb-3">
									    <label for="setting-input-3" class="form-label">Payés</label>
									    <input type="number" class="form-control" id="setting-input-3" name="payes" placeholder="payes" value="{{old('payes')}}">
										{{-- @error('montant')
											<div class="text-danger">{{$message}}</div>
										@enderror --}}
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Date</label>
									    <input type="date" class="form-control" id="setting-input-3" name="date" value="{{old('date')}}">
										@error('date')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
                                    
									<br>
									<button type="submit" class="btn app-btn-primary" >Enregistrer</button>
							    </form>
						    </div><!--//app-card-body-->
						    
						</div><!--//app-card-->
	                </div>
                </div>

@endsection