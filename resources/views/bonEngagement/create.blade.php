@extends('layout.template')

@section('content')

<h1 class="app-page-title">BON D'ENGAGEMENT</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Ajout</h3>
		                <div class="section-intro">Ajouter ici un nouveau bon</div>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <div class="app-card-body">
							    <form class="settings-form" method="POST" action="{{route('bonEngagement.store')}}">
                                    @csrf
                                    @method('POST')

									<div class="mb-3">
									    <label for="setting-input-3" class="form-label">Categorie de depenses</label>
                                        <select class="form-select" name="depense_id" id="depense_id" aria-label="Default select example">
											<option selected>Depenses</option>
											@foreach ($depenses as $depense)
												<option value="{{$depense->id}}">{{$depense->name}}</option>
											@endforeach
										  </select>

										@error('depense_id')
											<div class="text-danger">{{$message}}</div>
										@enderror

									</div>

								    
									
									<div class="mb-3">
									    <label for="setting-input-3" class="form-label">N° Compte</label>
                                        <select name="numero_compte" id="numero_compte" class="form-select" aria-label="Default select example">
                                            <option value="">Selectionnez un numero de compte</option>
											@foreach ($numero_comptes as $numero)
												<option value="{{$numero->numero_compte}}">{{$numero->numero_compte}}</option>
											@endforeach
                                        </select>
										@error('numero_compte')
											<div class="text-danger">{{$message}}</div>
										@enderror

									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Intitules</label>
									    <select name="intitules" id="intitules" class="form-select">
                                            <option value=""></option>
											@foreach ($intitules as $intitule)
												<option value="{{$intitule->intitules}}">{{$intitule->intitules}}</option>
											@endforeach
                                        </select>
										@error('intitules')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
									<div class="mb-3">
									    <label for="setting-input-3" class="form-label">Credits alloues(FCFA)</label>
									    <input type="number" class="form-control" id="setting-input-3" name="credits_alloues" placeholder="Credits alloues" value="{{old('credits_alloues')}}">
										@error('credits_alloues')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
									<div class="mb-3">
									    <label for="setting-input-2" class="form-label">N° (Numero bon/Annee en cours)</label>
									    <input type="text" class="form-control" id="setting-input-2" placeholder="Numero du bon"
                                         name="numero_bon" value="{{old('numero_bon')}}">
										 @error('numero_bon')
										 <div class="text-danger">{{$message}}</div>
									 @enderror
									</div>

									<div class="mb-3">
									    <label for="setting-input-1" class="form-label">Beneficiaire</label>
									    <input type="text" class="form-select" id="setting-input-1" placeholder="NOM DU BENEFICIAIRE" 
                                        name="beneficiaire" value="{{old('beneficiaire')}}">
										@error('beneficiaire')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
									
									<div class="mb-3">
									    <label for="setting-input-3" class="form-label">Classe</label>
                                        {{-- <select name="classe" id="classe" class="form-select">
                                            <option value=""></option>
											@foreach ($classes as $classe)
												<option value="{{$classe->classe}}">{{$classe->classe}}</option>
											@endforeach
                                        </select> --}}
										<select name="classe" id="classe" class="form-select">
											<option value=""></option>
											@foreach ($classes->unique('classe') as $classe)
												<option value="{{$classe->classe}}">{{$classe->classe}}</option>
											@endforeach
										</select>
										@error('classe')
											<div class="text-danger">{{$message}}</div>
										@enderror

									</div>
									<div class="mb-3">
									    <label for="setting-input-3" class="form-label">Compte Principal</label>
                                        {{-- <select name="cp" id="cp" class="form-select">
                                            <option value=""></option>
											@foreach ($cps as $cp)
												<option value="{{$cp->cp}}">{{$cp->cp}}</option>
											@endforeach
                                        </select> --}}
										<select name="cp" id="cp" class="form-select">
											<option value=""></option>
											@foreach ($cps->unique('cp') as $cp)
												<option value="{{$cp->cp}}">{{$cp->cp}}</option>
											@endforeach
										</select>
										
										@error('cp')
											<div class="text-danger">{{$message}}</div>
										@enderror

									</div>
									<div class="mb-3">
									    <label for="setting-input-3" class="form-label">Compte Divisionnire</label>
                                        <input type="number" class="form-control" id="setting-input-3" name="cd" 
										placeholder="cd" value="{{old('cd')}}">
										@error('cd')
											<div class="text-danger">{{$message}}</div>
										@enderror

									</div>

									<div class="mb-3">
									    <label for="setting-input-3" class="form-label">Montant (FCFA)</label>
									    <input type="number" class="form-control" id="setting-input-3" name="montant" placeholder="Montant" value="{{old('montant')}}">
										@error('montant')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
									<div class="mb-3">
									    <label for="setting-input-3" class="form-label">Quantite</label>
                                        <input type="number" class="form-control" id="setting-input-3" name="qte" 
										placeholder="Qte" value="{{old('qte')}}">
										@error('qte')
											<div class="text-danger">{{$message}}</div>
										@enderror

									</div>

                                    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Date</label>
									    <input type="date" class="form-control" id="setting-input-3" name="date" placeholder="Date d’émission" value="{{old('date')}}">
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