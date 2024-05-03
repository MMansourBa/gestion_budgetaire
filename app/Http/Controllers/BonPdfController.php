<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BonEngagement;
use Barryvdh\DomPDF\Facade\Pdf;


class BonPdfController extends Controller
{
    public function bonPdf($id)
    {
        // Récupérez le bon d'engagement spécifique correspondant à l'identifiant
        $bonEngagement = BonEngagement::findOrFail($id);

        // Récupérez l'intitulé du bénéficiaire depuis le bon d'engagement
        $beneficiaire = $bonEngagement->beneficiaire;
        $numero = $bonEngagement->numero_bon;

        $data = [
            'title' => 'BON D\'ENGAGEMENT N° '. $numero,
            'date' => date('d/m/Y'),
            'bonEngagements' => collect([$bonEngagement]), // Créez une collection contenant uniquement le bon d'engagement spécifique
            'beneficiaire' => $beneficiaire,
        ];

        // Générez le PDF avec ce bon d'engagement spécifique
        $pdf = PDF::loadView('bonEngagement.bonPDF', $data);
        return $pdf->download('Bon-Engagement.pdf');
    }
}



