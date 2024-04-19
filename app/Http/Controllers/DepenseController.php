<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use App\Http\Requests\saveDepenseRequest;
use Illuminate\Http\Request;
use Exception;

class DepenseController extends Controller
{
    
    public function index()
    {
        $depenses = Depense::paginate(10);
        return view('depenses.index', compact('depenses'));
    }

    //Ajout depense
    public function create()
    {
        return view('depenses.create');
    }

    //Modification depense
    public function edit(Depense $depense)
    {
        return view('depenses.edit', compact('depense'));
    }


    //Interaction avec la BD
    public function store(Depense $depense, saveDepenseRequest $request)
    {
        //Enregistrer un nouveau depense
        try{
            $depense->name = $request->name;

            $depense->save();

            return redirect()->route('depense.index')->with('success_message', 'Depense enregistré');

        }catch(Exception $e) {
            dd($e);
        }
        
    }

    //Modification depense
    public function update(Depense $depense, saveDepenseRequest $request)
    {
        try{
            $depense->name = $request->name;

            $depense->update();

            return redirect()->route('depense.index')->with('success_message', 'Depense modifié');

        }catch(Exception $e) {
            dd($e);
        }
        
    }


    //Suppression depense
    public function delete(Depense $depense)
    {
        try{
            $depense->delete();

            return redirect()->route('depense.index')->with('success_message', 'Depense supprimé');

        }catch(Exception $e) {
            dd($e);
        }
        
    }

    //Rechercher
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $depenses = Depense::where('name', 'LIKE', "%$searchTerm%")->get();

        return view('depenses.index', compact('depenses'));
    }   

}
