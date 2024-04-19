<?php

namespace App\Http\Controllers;

use App\Models\BonEngagement;
use App\Http\Requests\saveBonEngagementRequest;
use App\Http\Requests\UpdateBonEngagementRequest;
use Exception;
use PDF;
use Illuminate\Http\Request;

class BonEngagementController extends Controller
{
    public function index()
    {
        $bonEngagements = BonEngagement::paginate(10);
        return view('bonEngagement.index', compact('bonEngagements'));
    }

    //Ajout 
    public function create()
    {
        return view('bonEngagement.create');
    }

    //Modification 
    public function edit(BonEngagement $bonEngagement)
    {
        return view('bonEngagement.edit', compact('bonEngagement'));
    }


    //Interaction avec la BD
    
    public function store(saveBonEngagementRequest $request)
    {
        try{
            $bonEngagement = BonEngagement::create($request->all());

        if ($bonEngagement) {
            return redirect()->route('bonEngagement.index')->with('success_message', 'Bon ajouté avec succès');
        }

        }catch(Exception $e) {
            dd($e);
        }
        
    }

    //Mis a jour
    public function update(BonEngagement $bonEngagement, UpdateBonEngagementRequest $request)
    {
        try{
            $bonEngagement->numero = $request->numero;
            $bonEngagement->designation = $request->designation;
            $bonEngagement->prix_unitaire = $request->prix_unitaire;
            $bonEngagement->qte = $request->qte;

            $bonEngagement->update();

            return redirect()->route('bonEngagement.index')->with('success_message', 'Bon d\'engagement modifié');

        }catch(Exception $e) {
            dd($e);
        }
        
    }


    //Suppression 
    public function delete(BonEngagement $bonEngagement)
    {
        try{
            $bonEngagement->delete();

            return redirect()->route('bonEngagement.index')->with('success_message', 'Bon d\'engagement supprimé');

        }catch(Exception $e) {
            dd($e);
        }
        
    }

    public function downloadPDF($id)
    {
        // Récupérer le bon d'engagement correspondant à l'ID
        $bonEngagement = BonEngagement::find($id);

        // Générer le nom de fichier PDF
        $fileName = 'bon_engagement_' . $bonEngagement->id . '.pdf';

        // Générer le contenu PDF à partir d'une vue
        $pdf = PDF::loadView('bon_engagement.pdf', compact('bonEngagement'));

        // Télécharger le fichier PDF
        return $pdf->download($fileName);
    }
}
