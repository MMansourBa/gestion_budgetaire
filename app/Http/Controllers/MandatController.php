<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMandatRequest;
use App\Http\Requests\UpdateMandatRequest;
use App\Models\BonEngagement;
use App\Models\Mandat;
use Exception;
use Illuminate\Http\Request;

class MandatController extends Controller
{
     //Recherhe employers
     public function index()
     {
         $mandats = Mandat::with('bonEngagement')->paginate(10);
         return view('mandat.index', compact('mandats'));
     }
 
     //Ajout employers
     public function create()
     {
         $be = BonEngagement::all();
 
         return view('mandat.create', compact('be'));
     }
 
     //Modification employers
     public function edit(Mandat $mandat)
     {
         $be = BonEngagement::all();
 
         return view('mandat.edit', compact('mandat', 'be'));
     }
 
 
     public function store(StoreMandatRequest $request)
     {
         try{
             $query = Mandat::create($request->all());
 
             if($query){
                 return redirect()->route('mandat.index')->with('success_message', 'mandat ajoute avec succes');
             }
 
         }catch(Exception $e){
             dd($e);
         }
     }
 
     public function update(UpdateMandatRequest $request, Mandat $mandat)
     {
         try{
             $mandat->nom = $request->nom;
             $mandat->somme = $request->somme;
             $mandat->annee = $request->annee;
             $mandat->date = $request->date;
             $mandat->numero_mandat = $request->numero_mandat;
             $mandat->numero_be = $request->numero_be;
             $mandat->classe = $request->classe;
             $mandat->cp = $request->cp;
             $mandat->cd = $request->cd;
             $mandat->compte = $request->compte;
             $mandat->objet = $request->objet;
 
             $mandat->update();
 
             return redirect()->route('mandat.index')->with('success_message', 'Mis a jour effectue');
         } catch(Exception $e){
             dd($e);
         }
     }
 
     public function delete(Mandat $mandat)
     {
         try{
             $mandat->delete();
 
             return redirect()->route('mandat.index')->with('success_message', 'Suppresion reussi');
         } catch(Exception $e){
             dd($e);
         }
     }
}