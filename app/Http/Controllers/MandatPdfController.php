<?php

namespace App\Http\Controllers;

use App\Models\Mandat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MandatPdfController extends Controller
{
    public function mandatPdf($id)
    {
        // Récupérez le mandat spécifique correspondant à l'identifiant
        $mandat = Mandat::findOrFail($id);

        // Récupérez l'intitulé du bénéficiaire depuis le bon d'engagement
        $beneficiaire = $mandat->beneficiaire;
        $numero = $mandat->numero_mandat;

        $data = [
            'title' => 'MANDAT N° '. $numero,
            'date' => date('d/m/Y'),
            'mandats' => collect([$mandat]), // Créez une collection contenant uniquement le mandat spécifique
            'beneficiaire' => $beneficiaire,
        ];

        // Générez le PDF avec ce mandat spécifique
        $pdf = PDF::loadView('mandat.mandatPDF', $data);
        return $pdf->download('Mandat.pdf');
    }
}
