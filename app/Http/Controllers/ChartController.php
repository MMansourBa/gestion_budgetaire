<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function chart(){

        // $transactions = Transaction::selectRaw('MONTH(date) as month, COUNT(*) as count')
        //                             ->whereYear('date', date('Y'))
        //                             ->groupBy('month')
        //                             ->orderBy('month')
        //                             ->get();
        $transactions = Transaction::selectRaw('MONTH(date) as month, SUM(montant) as total_amount')
                        ->whereYear('date', date('Y'))
                        ->groupBy('month')
                        ->orderBy('month')
                        ->get();

        
        $labels = [];
        $data = [];
        $colors = ['#FFF6384', '#362A2EB', '#FFCE56', '#8BC34A', '#FF5722', '#009688', '#795548', '#9C0AE3'
                    , "#00000084", '#0F27FF84', '#8DAC3784', '#F3000084'];
        
        for($i=1; $i<=12; $i++){
            $month = date('F', mktime(0,0,0,$i,1));
            $count = 0;

            foreach($transactions as $transaction){
                if($transaction->month == $i){
                    // $count = $transaction->count;
                    $count = $transaction->total_amount;

                    break;
                }
            }

            array_push($labels,$month);
            array_push($data,$count);
        }

        $datasets = [
            [
                'label'=>'transactions',
                'data'=>$data,
                'backgroundColor'=>$colors  
            ]
            ];

            return view('charts', compact('datasets', 'labels'));
    }
}
