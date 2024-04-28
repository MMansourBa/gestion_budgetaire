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
									    <label for="setting-input-1" class="form-label">Beneficiaire<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
  <circle cx="8" cy="4.5" r="1"/>
</svg></span></label>
									    <input type="text" class="form-control" id="setting-input-1" placeholder="NOM DU BENEFICIAIRE" 
                                        name="beneficiare" value="{{old('beneficiare')}}">
										@error('beneficiare')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
									
									<div class="mb-3">
									    <label for="setting-input-3" class="form-label">N° Compte</label>
                                        <select name="numero_compte" id="numero_compte" class="form-control">
                                            <option value=""></option>


											@foreach ($numeros as $numero)
												<option value="{{$numero->numero_compte}}">{{$numero->numero_compte}}</option>
											@endforeach
                                        </select>

										@error('numero_compte')
											<div class="text-danger">{{$message}}</div>
										@enderror

									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Intitules</label>
									    <input type="text" class="form-control" id="setting-input-3" name="intitules" placeholder="Intitules" value="{{old('intitules')}}">
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
									    <label for="setting-input-3" class="form-label">Montant</label>
									    <input type="number" class="form-control" id="setting-input-3" name="montant" placeholder="Montant" value="{{old('montant')}}">
										@error('montant')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
									<div class="mb-3">
									    <label for="setting-input-3" class="form-label">Categorie de depenses</label>
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
									    <label for="setting-input-3" class="form-label">Classe</label>
                                        <select name="classe" id="classe" class="form-control">
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
                                        <select name="cp" id="cp" class="form-control">
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
                                        <select name="cd" id="cd" class="form-control">
                                            <option value=""></option>


											@foreach ($cds as $cd)
												<option value="{{$cd->cd}}">{{$cd->cd}}</option>
											@endforeach
                                        </select>

										@error('cd')
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