<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Inscription | UFR SET</title>
        <link rel="stylesheet" href="assets/css/register.css" />
        <style>
            .error-message {
            text-align: center;
            background-color: #D64848;
            padding: 5px;
            border-radius: 5px;
            margin-bottom: 10px; /* Espacement entre le message d'erreur et le titre "Se connecter" */
            /* margin-top: 30px; */
            
          }

          .error-message {
            text-align: center;
            background-color: #D64848;
            padding: 5px;
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
            @if(session('success'))
            <div class="alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
                <div class="error-message">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('register.store') }}" method="POST">
              @csrf
              <h1>Créez un compte !</h1>
              <hr />
              <p>Renseignez les champs</p>
              <label>Nom complet</label>
              <input type="text" name="name" placeholder="Prenom(s) & Nom" required />
              <label>Email</label>
              <input type="text" name="email" placeholder="Email" required />
              <label>Numero de telephone</label>
              <input type="numeric" name="telephone" placeholder="Numero de telephone" required />
              <label>Poste</label>
              <select name="poste" required>
                <option value="">Sélectionnez un poste</option>
                <option value="csa">Chef de Service Administratif</option>
                <option value="csf">Chef de Service Financier</option>
                <option value="directeur">Directeur</option>
              </select>
              <label>Mot de passe</label>
              <input type="password" name="password" placeholder="Mot de passe" required />
              <label>Confirmer Mot de passe</label>
              <input type="password" name="password_confirmation" placeholder="Confirmer Mot de passe" required />
              <br><br>
              <button><span>S'inscrire</span></button>
              <p><a href="{{ route('login') }}">J'ai deja un compte</a></p>
            </form>
          </div>
          <div class="pic">
            <img src="assets/images/login.jpg" />
          </div>
        </div>
      </body>
    </html></span>