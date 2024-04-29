<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveBonEngagementRequest;
use App\Http\Requests\UpdateBonengagementRequest;
use App\Models\BonEngagement;
use App\Models\Budget;
use App\Models\Compte;
use App\Models\Depense;
use App\Models\Transaction;
use Exception;

use Illuminate\Http\Request;

class BonEngagementController extends Controller
{
    public function index()
    {
        // Récupérer toutes les catégories de dépenses disponibles
        $depenses = Depense::all();
        // $comptes = Compte::all();
        // $budgets = Budget::all();
        // $transactions = Transaction::all();

        // Initialiser un tableau pour stocker les comptes par catégorie
        $bonsParCategorie = [];

        // Pour chaque catégorie, récupérer les bons associées
        foreach ($depenses as $depense) {
            // Récupérer les bons associées à cette catégorie
            $depenses = BonEngagement::where('depense_id', $depense->id)->paginate(10);

            // Stocker les bons dans le tableau $bonsParCategorie
            $bonsParCategorie[$depense->name] = $depenses;
        }

        // Passer les données à la vue
        return view('bonEngagement.index', compact('bonsParCategorie'));
    }

    //Ajout 
    public function create()
    {
        $depenses = Depense::all();
        $classes = Compte::all();
        $cps = Compte::all();
        $cds = Compte::all();
        $numero_comptes = Compte::all();
        $credits = Budget::all();
        $intitules = Compte::all();

        return view('bonEngagement.create', compact('depenses', 'classes', 'cps', 'numero_comptes', 'credits', 'intitules'));
    }

    //Modification 
    public function edit(BonEngagement $bon)
    {
        $depenses = Depense::all();
        $classes = Compte::all();
        $cps = Compte::all();
        $numero_comptes = Compte::all();
        $credits = Budget::all();
        $intitules = Compte::all();

        return view('bonEngagement.edit', compact('bon', 'depenses', 'classes', 'cps', 'numero_comptes', 'credits', 'intitules'));
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
    public function update(BonEngagement $bon, UpdateBonEngagementRequest $request)
    {
        try{
            $bon->numero_bon = $request->numero_bon;
            $bon->beneficiaire = $request->beneficiaire;
            $bon->intitules = $request->intitules;
            $bon->credits_alloues = $request->credits_alloues;
            $bon->montant = $request->montant;
            $bon->qte = $request->qte;
            $bon->classe = $request->classe;
            $bon->cp = $request->cp;
            $bon->cd = $request->cd;
            $bon->numero_compte = $request->numero_compte;
            $bon->depense_id = $request->depense_id;
            $bon->date = $request->date;

            $bon->update();

            return redirect()->route('bonEngagement.index')->with('success_message', 'Classe de bonEngagement modifié');

        }catch(Exception $e) {
            dd($e);
        }
        
    }


    //Suppression 
    public function delete(BonEngagement $bon)
    {
        try{
            $bon->delete();

            return redirect()->route('bonEngagement.index')->with('success_message', 'Classe de compte supprimé');

        }catch(Exception $e) {
            dd($e);
        }
        
    }
}
