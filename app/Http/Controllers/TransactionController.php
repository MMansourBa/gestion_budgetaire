<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Depense;
use App\Models\Transaction;

use Exception;


class TransactionController extends Controller
{
    public function index()
    {
        // Récupérer toutes les catégories de dépenses disponibles
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
    }



    //Ajout transactions
    public function create()
    {
        $depenses = Depense::all();

        return view('transactions.create', compact('depenses'));
    }

    //Modification transactions
    public function edit(Transaction $transaction)
    {
        $depenses = Depense::all();

        return view('transactions.edit', compact('transaction', 'depenses'));
    }


    public function store(StoreTransactionRequest $request)
    {
        try{
            
            $query = Transaction::create($request->all());

            if($query){
                return redirect()->route('transaction.index')->with('success_message', 'Transaction ajoute avec succes');
            }

        }catch(Exception $e){
            dd($e);
        }
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        try{
            $transaction->numero_compte = $request->numero_compte;
            $transaction->intitule = $request->intitule;
            $transaction->credits_alloues = $request->credits_alloues;
            $transaction->numero_depense = $request->numero_depense;
            $transaction->depense_id = $request->depense_id;
            $transaction->titre_depense = $request->titre_depense;
            $transaction->montant = $request->montant;
            $transaction->date = $request->date;

            $transaction->update();

            return redirect()->route('transaction.index')->with('success_message', 'Mis a jour effectue');
        } catch(Exception $e){
            
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
