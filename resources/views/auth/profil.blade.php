@extends('layout.template')

@section('content')
<h1 class="app-page-title">PROFIL</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Vous pouvez mettre à jour votre profil</h3>
		                {{-- <div class="section-intro">Allouer ici un nouveau budget pour un compte</div> --}}
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <div class="app-card-body">
							    <form method="POST" action="{{ route('profil.update') }}">
                                    @csrf
                                    @method('POST')

                                    <div class="mb-3">
										<label for="setting-input-3" class="settings-form" method="POST">Nom Complet</label>
										<input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control" required>
										<label for="setting-input-3" class="settings-form" method="POST">Email</label>
										<input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control" required>
										<label for="setting-input-3" class="settings-form" method="POST">Numero de telephone</label>
										<input type="text" name="telephone" value="{{ auth()->user()->telephone }}" class="form-control" required>
										<label for="setting-input-3" class="settings-form" method="POST">Mot de passe</label>
										<input type="password" name="password" placeholder="Nouveau mot de passe" class="form-control">
										<label for="setting-input-3" class="settings-form" method="POST">Confirmation de mot de passe</label>
										<input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" class="form-control">

                                    <br>
									<button type="submit" class="btn app-btn-primary" >Mettre à jour</button>
							    </form>
						    </div><!--//app-card-body-->
						    
						</div><!--//app-card-->
	                </div>
                </div>
@endsection