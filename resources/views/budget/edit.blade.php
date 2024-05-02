@extends('layout.template')

@section('content')

<h1 class="app-page-title">ALLOCATION BUDGETAIRE</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Editer</h3>
		                <div class="section-intro"></div>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <div class="app-card-body">
							    <form class="settings-form" method="POST" action="{{route('budget.update', $budget->id)}} ">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Numero de compte</label>
                                        <select name="numero_compte" id="numero_compte" class="form-select">
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
									    <label for="setting-input-1" class="form-label">Credits alloues (FCFA)</label>
  
									    <input type="number" class="form-control" id="setting-input-1" placeholder="Budget alloue" name="credits_alloues" value="{{old('credits_alloues')}}">
										@error('credits_alloues')
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