<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Connexion | UFR SET</title>
  <link rel="stylesheet" href="assets/css/login.css" />
  <style>
    .error-message {
    text-align: center;
    background-color: #D64848;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px; /* Espacement entre le message d'erreur et le titre "Se connecter" */
    margin-top: 30px;
    }
    .alert-success{
            text-align: center;
            background-color: rgb(88, 206, 98);
            padding: 5px;
            border-radius: 5px;
            margin-bottom: 10px; /* Espacement entre le message d'erreur et le titre "Se connecter" */
            margin-top: 30px;
            
    }
  </style>
  </head>
  <body>
    <div class="container">
      <div class="login">
        {{-- @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger text-light" role="alert">
            {{ session('error') }}
            </div>
        @endif --}}
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
          @csrf
          <h1>Se connecter</h1>
          <hr />
          <p>Entrez vos identifiants</p>
          <label>Email</label>
          <input type="text" name="email" placeholder="Email" required /> <!-- Ajout de l'attribut name -->
          <label>Mot de passe</label>
          <input type="password" name="password" placeholder="Mot de passe" required /> <!-- Ajout de l'attribut name -->
          <button type="submit"><span>Connexion</span></button>
          <p><a href="{{ route('register') }}">Créer un compte</a></p>
      </form>
      
      </div>
      <div class="pic">
        <img src="assets/images/login.jpg" />
      </div>
    </div>
  </body>
</html>