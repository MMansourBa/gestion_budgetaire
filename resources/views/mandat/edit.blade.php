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
									    <label for="setting-input-3" class="form-label">N° Mandat</label>
                                        <select name="numero_mandat" id="numero_mandat" class="form-select">
                                            <option value=""></option>
											@foreach ($be as $bon)
												<option value="{{$bon->numero_bon}}">{{$bon->numero_bon}}</option>
											@endforeach
                                        </select>

										@error('numero_mandat')
											<div class="text-danger">{{$message}}</div>
										@enderror

									</div>
									<div class="mb-3">
									    <label for="setting-input-3" class="form-label">Objet</label>
									    <select name="objet" id="objet" class="form-select">
                                            <option value=""></option>
											@foreach ($be as $bon)
												<option value="{{$bon->intitules}}">{{$bon->intitules}}</option>
											@endforeach
                                        </select>
										@error('objet')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
								    <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Beneficiaire</label>
									    <select name="beneficiaire" id="beneficiaire" class="form-select">
                                            <option value=""></option>
											@foreach ($be as $bon)
												<option value="{{$bon->beneficiaire}}">{{$bon->beneficiaire}}</option>
											@endforeach
                                        </select>
										@error('beneficiaire')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
									<div class="mb-3">
									    <label for="setting-input-2" class="form-label">Montant</label>
									    <select name="montant" id="montant" class="form-select">
                                            <option value=""></option>
											@foreach ($be as $bon)
												
												<option value="{{$bon->montant}}">{{$bon->montant}}</option>
											@endforeach
                                        </select>
										 @error('montant')
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