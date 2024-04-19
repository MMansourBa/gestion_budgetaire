@extends('layout.template')

@section('content')

<h1 class="app-page-title">Mandat</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Edition</h3>
		                <div class="section-intro">Editer le mandat</div>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <div class="app-card-body">
							    <form class="settings-form" method="POST" action="{{route('mandat.update', $mandat->id)}}">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Nom <span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
  <circle cx="8" cy="4.5" r="1"/>
</svg></span></label>
									    <input type="text" class="form-control" id="setting-input-1" placeholder="NOM ET ADRESSE DU CREANCIER" 
                                        name="nom" value="{{old('nom')}}">
										@error('nom')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
									<div class="mb-3">
									    <label for="setting-input-2" class="form-label">Somme</label>
									    <input type="number" class="form-control" id="setting-input-2" placeholder="Somme"
                                         name="somme" value="{{old('somme')}}">
										 @error('somme')
										 <div class="text-danger">{{$message}}</div>
									 @enderror
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Annee</label>
									    <input type="number" class="form-control" id="setting-input-3" name="annee" placeholder="Annee" value="{{old('annee')}}">
										@error('annee')
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
                                    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">N° mandat</label>
									    <input type="number" class="form-control" id="setting-input-3" name="numero_mandat" placeholder="Numero" value="{{old('numero_mandat')}}">
										@error('numero_mandat')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">N° bon d'engagement</label>
                                        <select name="numero_be" id="numero_be" class="form-control">
                                            <option value=""></option>


											@foreach ($be as $bon)
												<option value="{{$bon->id}}">{{$bon->numero}}</option>
											@endforeach
                                        </select>

										@error('numero_be')
											<div class="text-danger">{{$message}}</div>
										@enderror

									</div>
                                    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Classe</label>
									    <input type="number" class="form-control" id="setting-input-3" name="classe" value="{{old('classe')}}">
										@error('classe')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
									<div class="mb-3">
									    <label for="setting-input-3" class="form-label">C.P</label>
									    <input type="number" class="form-control" id="setting-input-3" name="cp" placeholder="CP" value="{{old('cp')}}">
										@error('cp')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">C.D</label>
									    <input type="number" class="form-control" id="setting-input-3" name="cd" placeholder="CD" value="{{old('cd')}}">
										@error('cd')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Compte</label>
									    <input type="number" class="form-control" id="setting-input-3" name="compte" placeholder="compte" value="{{old('compte')}}">
										@error('compte')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
									<div class="mb-3">
									    <label for="setting-input-3" class="form-label">Objet</label>
									    <textarea class="form-control" id="setting-input-2" placeholder="objet"
                                         name="objet">{{ old('objet') }}</textarea>
										@error('objet')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
                                    
                                    
        
									<button type="submit" class="btn app-btn-primary" >Mettre a jour</button>
							    </form>
						    </div><!--//app-card-body-->
						    
						</div><!--//app-card-->
	                </div>
                </div>

@endsection