@extends('layout.template')

@section('content')

<h1 class="app-page-title">NOMENCLATURE DES COMPTES</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Ajout</h3>
		                <div class="section-intro">Ajouter ici une nouvelle compte de classe</div>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <div class="app-card-body">
							    <form class="settings-form" method="POST" action="{{route('compte.store')}}">
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
									    <label for="setting-input-1" class="form-label">Classe<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  
</svg></span></label>
									    <input type="number" class="form-control" id="setting-input-1" placeholder="Classe" 
                                        name="classe" value="{{old('classe')}}">
										@error('classe')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
									<div class="mb-3">
									    <label for="setting-input-2" class="form-label">Compte principal</label>
                                        <input type="number" class="form-control" id="setting-input-1" placeholder="C.P" 
                                            name="cp" value="{{old('cp')}}">
                                         @error('cp')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
								    <div class="mb-3">
									    <label for="setting-input-2" class="form-label">Compte divisionnaire</label>
                                        <input type="number" class="form-control" id="setting-input-1" placeholder="C.D" 
                                            name="cd" value="{{old('cd')}}">
                                         @error('cd')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Numero Compte</label>
									    <input type="number" class="form-control" id="setting-input-3" name="numero_compte" placeholder="Compte"
                                        value="{{old('numero_compte')}}">
										@error('numero_compte')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Intitule</label>
									    <input type="text" class="form-control" id="setting-input-3" name="intitules" placeholder="Intitule"
                                        value="{{old('intitules')}}">
										@error('intitules')
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