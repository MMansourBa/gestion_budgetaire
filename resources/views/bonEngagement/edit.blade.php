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
							    <form class="settings-form" method="POST" action="{{route('bonEngagement.update', $bonEngagement->id)}}">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Numero<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  
</svg></span></label>
									    <input type="number" class="form-control" id="setting-input-1" placeholder="Numero" 
                                        name="numero" value="{{old('numero')}}">
										@error('numero')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
									<div class="mb-3">
									    <label for="setting-input-2" class="form-label">Designation</label>
                                        <textarea class="form-control" id="setting-input-2" placeholder="Designation"
                                         name="designation">{{ old('designation') }}</textarea>
                                         @error('designation')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Prix unitaire</label>
									    <input type="number" class="form-control" id="setting-input-3" name="prix_unitaire" placeholder="Prix unitaire"
                                         value="{{old('prix_unitaire')}}">
										@error('prix_unitaire')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Quantite</label>
									    <input type="number" class="form-control" id="setting-input-3" name="qte" placeholder="Quantite" value="{{old('qte')}}">
										@error('qte')
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