<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveCompteRequest;
use App\Http\Requests\UpdateCompteRequest;
use App\Models\Compte;
use App\Models\Depense;
use Exception;

use Illuminate\Http\Request;

class CompteController extends Controller
{
    // public function index()
    // {
    //     // Récupérer toutes les catégories de dépenses disponibles
    //     $categories = Depense::all();

    //     // Initialiser un tableau pour stocker les comptes par catégorie
    //     $comptesParCategorie = [];

    //     // Pour chaque catégorie, récupérer les comptes associées
    //     foreach ($categories as $categorie) {
    //         // Récupérer les comptes associées à cette catégorie
    //         $comptes = Compte::where('depense_id', $categorie->id)->paginate(10);

    //         // Stocker les comptes dans le tableau $comptesParCategorie
    //         $comptesParCategorie[$categorie->name] = $comptes;
    //     }

    //     // Passer les données à la vue
    //     return view('compte.index', compact('comptesParCategorie'));
    // }

    public function index()
{
    // Récupérer toutes les catégories de dépenses disponibles
    $categories = Depense::all();

    // Initialiser un tableau pour stocker les comptes par catégorie
    $comptesParCategorie = [];

    // Pour chaque catégorie, récupérer les comptes associés
    foreach ($categories as $categorie) {
        // Récupérer les comptes associés à cette catégorie
        $comptes = Compte::where('depense_id', $categorie->id)->get();

        // Initialiser un tableau pour stocker les comptes par classe
        $comptesParClasse = [];

        // Organiser les comptes par classe
        foreach ($comptes as $compte) {
            $classe = substr($compte->numero_compte, 0, 1); // Extraire la classe du numéro de compte

            // Vérifier si la classe existe déjà dans le tableau, sinon l'initialiser
            if (!isset($comptesParClasse[$classe])) {
                $comptesParClasse[$classe] = [];
            }

            // Ajouter le compte à la classe correspondante
            $comptesParClasse[$classe][] = $compte;
        }

        // Stocker les comptes par classe dans le tableau $comptesParCategorie
        $comptesParCategorie[$categorie->name] = $comptesParClasse;
    }

    // Passer les données à la vue
    return view('compte.index', compact('comptesParCategorie'));
}


    //Ajout 
    public function create()
    {
        $depenses = Depense::all();

        return view('compte.create', compact('depenses'));
    }

    //Modification 
    public function edit(Compte $compte)
    {
        $depenses = Depense::all();

        return view('compte.edit', compact('compte', 'depenses'));
    }


    //Interaction avec la BD
    
    public function store(saveCompteRequest $request)
    {
        try{
            $compte = Compte::create($request->all());

        if ($compte) {
            return redirect()->route('compte.index')->with('success_message', 'Classe de compte ajouté avec succès');
        }

        }catch(Exception $e) {
            dd($e);
        }
        
    }

    //Mis a jour
    public function update(Compte $compte, UpdateCompteRequest $request)
    {
        try{
            $compte->classe = $request->classe;
            $compte->cp = $request->cp;
            $compte->cd = $request->cd;
            $compte->numero_compte = $request->numero_compte;
            $compte->intitules = $request->intitules;
            $compte->depense_id = $request->depense_id;

            $compte->update();

            return redirect()->route('compte.index')->with('success_message', 'Classe de compte modifié');

        }catch(Exception $e) {
            dd($e);
        }
        
    }


    //Suppression 
    public function delete(Compte $compte)
    {
        try{
            $compte->delete();

            return redirect()->route('compte.index')->with('success_message', 'Classe de compte supprimé');

        }catch(Exception $e) {
            dd($e);
        }
        
    }
}
