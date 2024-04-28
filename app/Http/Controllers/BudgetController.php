<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBudgetRequest;
use App\Http\Requests\UpdateBudgetRequest;
use App\Models\Budget;
use App\Models\Compte;
use Exception;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index()
    {
        $budgets = Budget::with('compte')->paginate(10);
        return view('budget.index', compact('budgets'));
    }



    //Ajout transactions
    public function create()
    {
        $comptes = Compte::all();

        return view('budget.create', compact('comptes'));
    }

    //Modification transactions
    public function edit(Budget $budget)
    {
        $comptes = Compte::all();

        return view('budget.edit', compact('budget', 'comptes'));
    }


    public function store(StoreBudgetRequest $request)
    {
        try{
            
            $query = Budget::create($request->all());

            if($query){
                return redirect()->route('budget.index')->with('success_message', 'budget ajoute avec succes');
            }

        }catch(Exception $e){
            dd($e);
        }
    }

    public function update(UpdateBudgetRequest $request, Budget $budget)
    {
        try{
            $budget->numero_compte = $request->numero_compte;
            $budget->credits_alloues = $request->credits_alloues;

            $budget->update();

            return redirect()->route('budget.index')->with('success_message', 'Mis a jour effectue');
        } catch(Exception $e){
            dd($e);
        }
    }

    public function delete(Budget $budget)
    {
        try{
            $budget->delete();

            return redirect()->route('budget.index')->with('error_message', 'Suppresion reussi');
        } catch(Exception $e){
            dd($e);
        }
    }
}
