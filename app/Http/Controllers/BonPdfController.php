<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BonEngagement;
use Barryvdh\DomPDF\Facade\Pdf;


class BonPdfController extends Controller
{
    public function bonPdf()
    {
        $bonEngagement = BonEngagement::get();

        $data = [
            'title' => 'BON D\'ENAGAGEMENT N°',
            'date' => date('d/m/Y'),
            'bonEngagements' => $bonEngagement
        ];

        $pdf = PDF::loadView('bonEngagement.bonPDF', $data);
        return $pdf->download('Bon-Engagement.pdf');
    }
}
