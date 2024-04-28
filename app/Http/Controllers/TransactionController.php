<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use Illuminate\Http\Request;
use App\Models\Depense;
use App\Models\Budget;
use App\Models\Compte;
use App\Models\Transaction;

use Exception;


class TransactionController extends Controller
{
    public function index()
    {
        //Récupérer toutes les catégories de dépenses disponibles
        $categories = Depense::all();

        // Initialiser un tableau pour stocker les transactions par catégorie
        $transactionsParCategorie = [];

        // Pour chaque catégorie, récupérer les transactions associées
        foreach ($categories as $categorie) {
            // Récupérer les transactions associées à cette catégorie
            $transactions = Transaction::where('depense_id', $categorie->id)->paginate(10);

            // Stocker les transactions dans le tableau $transactionsParCategorie
            $transactionsParCategorie[$categorie->name] = $transactions;
        }

        // Passer les données à la vue
        return view('transactions.index', compact('transactionsParCategorie'));

        // $transactions = Transaction::with('depense', 'budget', 'compte')->paginate(10);
        // return view('transactions.index', compact('transactions'));
    }



    //Ajout transactions
    public function create()
    {
        $depenses = Depense::all();
        $budgets = Budget::all();
        $comptes = Compte::all();

        return view('transactions.create', compact('depenses', 'budgets', 'comptes'));
    }

    //Modification transactions
    public function edit(Transaction $transaction)
    {
        $depenses = Depense::all();
        $budgets = Budget::all();
        $comptes = Compte::all();

        return view('transactions.edit', compact('transaction', 'depenses', 'budgets', 'comptes'));
    }


    // public function store(StoreTransactionRequest $request)
    // {
    //     try{
            
    //         $query = Transaction::create($request->all());

    //         if($query){
    //             return redirect()->route('transaction.index')->with('success_message', 'Transaction ajoute avec succes');
    //         }

    //     }catch(Exception $e){
    //         dd($e);
    //     }
    // }
        
    public function store(Request $request)
    {
        $request->validate([
            'depense_id' => 'required|exists:depenses,id',
            'numero_compte' => 'required',
            'intitules' => 'required',
            'credits_alloues' => 'required',
            'date' => 'required|date',
            'montant' => 'required|numeric|min:0', // Ajoutez une règle de validation pour le montant
        ]);

        $numero_compte = $request->input('numero_compte');
        $montant = $request->input('montant');

        // Récupérez le crédit alloué pour ce numéro de compte depuis la table Budget
        $budget = Budget::where('numero_compte', $numero_compte)->first();

        if ($budget) {
            // Calculer la somme des montants des transactions existantes pour ce numéro de compte
            $montantTotalTransactions = Transaction::where('numero_compte', $numero_compte)->sum('montant');
    
            // Vérifier si la nouvelle transaction dépasse le crédit alloué
            if (($montantTotalTransactions + $montant) <= $budget->credits_alloues) {
                // Créer la transaction si elle ne dépasse pas le crédit alloué
                Transaction::create($request->all());
                return redirect()->route('transaction.index')->with('success_message', 'Transaction créée avec succès.');
            } else {
                return redirect()->route('transaction.index')->with('error_message', 'La somme des montants des transactions dépasse le crédit alloué pour ce numéro de compte.');
            }
        } else {
            return redirect()->route('transaction.index')->with('error', 'Aucun crédit alloué trouvé pour ce numéro de compte.');
        }
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        try{
            $transaction->numero_compte = $request->numero_compte;
            $transaction->intitules = $request->intitules;
            $transaction->credits_alloues = $request->credits_alloues;
            $transaction->numero_bon = $request->numero_bon;
            $transaction->intitule = $request->intitule;
            $transaction->depense_id = $request->depense_id;
            $transaction->titre_depense = $request->titre_depense;
            $transaction->montant = $request->montant;
            $transaction->payes = $request->payes;
            $transaction->date = $request->date;

            $transaction->update();

            return redirect()->route('transaction.index')->with('success_message', 'Mis a jour effectue');
        } catch(Exception $e){
            dd($e);
        }
    }

    public function delete(Transaction $transaction)
    {
        try{
            $transaction->delete();

            return redirect()->route('transaction.index')->with('error_message', 'Suppresion reussi');
        } catch(Exception $e){
            dd($e);
        }
    }
}
