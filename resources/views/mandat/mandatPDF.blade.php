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
            <div class="title"><p>  <span>Budget: </span>UFR SET</p></div>
        </div>
        {{-- <div class="beneficier">
            <h3>BENEFICIAIRE : {{$beneficiaire}}</h3>
        </div> --}}
        <br> <br>   
        <table>
            <thead>
            <tr>
                <th style="width: 100px;">NUMERO</th>
                <th style="width: 100px;">BENEFICIAIRE</th>
                <th style="width: 100px;">MONTANT</th>
                <th style="width: 100px;">DATE</th>
                <th style="width: 200px;">OBJET</th>
            </tr>
            </thead>
            <tbody>
                @foreach($mandats as $mandat)
                    <tr>
                        <td style="width: 100px;">{{$mandat->numero_mandat}}</td>
                        <td style="width: 100px;">{{$mandat->beneficiaire}}</td>
                        <td style="width: 100px;">{{$mandat->montant}}</td>
                        <td style="width: 100px;">{{$mandat->date}}</td>
                        <td style="width: 200px;">{{$mandat->objet}}</td>
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
            {{-- <div class="visa">
                <h3>Visa A.C.P.</h3>
                <div class="contenu">
                </div> --}}
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