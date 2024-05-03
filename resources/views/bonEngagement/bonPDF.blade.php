<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="assets/css/bon.css">
</head>
<body>
    <header>
        <div class="universite">
            {{-- <h2>UNIVERSITE IBA DER THIAM de THIES (UIDT) UFR DES SCIENCES ET TECHNOLOGIES
            </h2> --}}
            <img src="assets/images/logo.jpg" alt="logo">
        </div>
        <div class="date">Thiès, le {{{$date}}}</div>
    </header>
    <br>
    <br>
    <main>
        

        <div class="titre">
            <h1><center>{{$title}}</center></h1>
        </div>
        <div class="service">
            <div class="title"><p>  <span>Service émetteur: </span>UFR SET</p></div>
            {{-- <div class="compte">
                <p>Classe: 6 </p>
                <p> Compte Principal: 61</p>
                <p>Compte Divisionnaire: 618</p>
                <p> Compte: 6184</p>
            </div> --}}
        </div>
        <div class="beneficier">
            <h3>BENEFICIAIRE : {{$beneficiaire}}</h3>
        </div>
        <br> <br>   
        <table>
            <thead>
            <tr>
                <th>N°</th>
                <th>DÉSIGNATION</th>
                <th>P.UNIT</th>
                <th>QTE</th>
                <th>MONTANT</th>
                {{-- <th>Cree le </th> --}}
            </tr>
            </thead>
            <tbody>
                @foreach($bonEngagements as $bonEngagement)
                    <tr>
                        <td>{{$bonEngagement->id}}</td>
                        <td>{{$bonEngagement->intitules}}</td>
                        <td>{{$bonEngagement->montant}}</td>
                        <td>{{$bonEngagement->qte}}</td>
                        <td>{{$bonEngagement->montant * $bonEngagement->qte}}</td>
                        {{-- <td>{{$bonEngagement->created_at->format('d-m-Y') }}</td> --}}
                    </tr>
                @endforeach
            
            </tbody>
            {{-- <tfoot>
            <tr>
                <td colspan="4" class="foot">TOTAL</td>
                <td>100000</td>
            </tr>
            </tfoot> --}}
        </table>
        <div class="signature">
            <div class="visa">
                <h3>Visa A.C.P.</h3>
                <div class="contenu">
                </div>
            </div>
            <div class="ordonnateur">
                <h3>Signature de l’ordonnateur</h3>
                <div class="contenu">
                </div>
            </div>
        </div>
    </main>
</body>
</html>