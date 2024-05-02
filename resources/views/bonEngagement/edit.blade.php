@extends('layout.template')

@section('content')

<h1 class="app-page-title">Bon</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Edition</h3>
		                <div class="section-intro">Editer la depense</div>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <div class="app-card-body">
							    <form class="settings-form" method="POST" action="{{route('bonEngagement.update', $bon->id)}}">
                                    @csrf
                                    @method('PUT')

									<div class="mb-3">
									    <label for="setting-input-3" class="form-label">Categorie de depenses</label>
                                        <select name="depense_id" id="depense_id" class="form-select">
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
									    <label for="setting-input-3" class="form-label">N° Compte</label>
                                        <select name="numero_compte" id="numero_compte" class="form-select">
                                            <option value=""></option>


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
									    <label for="setting-input-3" class="form-label">Credits alloues</label>
									    <input type="number" class="form-control" id="setting-input-3" name="credits_alloues" placeholder="Credits alloues" value="{{old('credits_alloues')}}">
										@error('credits_alloues')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
									<div class="mb-3">
									    <label for="setting-input-2" class="form-label">N°</label>
									    <input type="text" class="form-control" id="setting-input-2" placeholder="Numero du bon"
                                         name="numero_bon" value="{{old('numero_bon')}}">
										 @error('numero_bon')
										 <div class="text-danger">{{$message}}</div>
									 @enderror
									</div>

									<div class="mb-3">
									    <label for="setting-input-1" class="form-label">Beneficiaire</label>
									    <input type="text" class="form-control" id="setting-input-1" placeholder="NOM DU BENEFICIAIRE" 
                                        name="beneficiaire" value="{{old('beneficiaire')}}">
										@error('beneficiaire')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
									
									<div class="mb-3">
									    <label for="setting-input-3" class="form-label">Classe</label>
                                        <select name="classe" id="classe" class="form-select">
                                            <option value=""></option>


											@foreach ($classes as $classe)
												<option value="{{$classe->classe}}">{{$classe->classe}}</option>
											@endforeach
                                        </select>

										@error('classe')
											<div class="text-danger">{{$message}}</div>
										@enderror

									</div>
									<div class="mb-3">
									    <label for="setting-input-3" class="form-label">Compte Principal</label>
                                        <select name="cp" id="cp" class="form-select">
                                            <option value=""></option>


											@foreach ($cps as $cp)
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
									    <label for="setting-input-3" class="form-label">Montant</label>
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
                                    
                                    
        
									<button type="submit" class="btn app-btn-primary" >Mettre a jour</button>
							    </form>
						    </div><!--//app-card-body-->
						    
						</div><!--//app-card-->
	                </div>
                </div>

@endsection