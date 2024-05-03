<?php
 
namespace App\Http\Controllers;

use App\Models\Depense;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
 
class AuthController extends Controller
{
    public function login(){
        // if(Auth::check()){
        //     return redirect()->route('dashboard');
        // }
        return view('auth.login');
    }
 
    public function post(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
    
        // dd($credentials); // Vérifiez si les informations d'identification sont correctes
    
        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        }
        return back()->with('error', 'E-mail ou mot de passe incorrect');
    }
    
 
    public function register(){
        // if(Auth::check()){
        //     return redirect()->route('dashboard');
        // }
        return view('auth.register');
    }
 
    // public function postRegister(Request $request){
    //     $check_email = User::where('email', $request->email)->first();
    //     if($check_email){
    //         return back()->with('error', 'E-mail déjà utilisé');
    //     }
    
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password)
    //     ]);
    
    //     return redirect()->route('login')->with('success', 'Félicitations, votre compte a été créé avec succès !');
    // }

    public function postRegister(Request $request)
    {
        // Valider les données de la requête
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telephone' => 'required|integer',
            'password' => 'required|confirmed|min:6',
            'poste' => 'required|string'
        ]);

        // Créer un nouvel utilisateur avec les données validées
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->telephone = $validated['telephone'];
        $user->password = Hash::make($validated['password']);
        $user->poste = $validated['poste']; 

        $user->save();

        return redirect()->route('login')->with('success', 'Utilisateur créé avec succès');
    }
    
 
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function profil()
    {
        return view('auth.profil');
    }
    public function update(Request $request) {
        try{
            // Valider les données
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . auth()->user()->id,
                'telephone' => 'required|integer',
                'password' => 'nullable|string|min:8|confirmed',
            ]);
        
            // Mettre à jour l'utilisateur
            $user = auth()->user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->telephone = $request->telephone;
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
        
            return redirect()->route('dashboard')->with('success', 'Informations mises à jour avec succès.');
        }catch(Exception $e) {
            dd($e);
        }
    }

    




    public function dashboard(){
        $totalBudget = DB::table('budgets')->sum('credits_alloues');

        $totalDepense = DB::table('transactions')->sum('montant');
        
        $soldeRestant = $totalBudget - $totalDepense;

        $totalCategorie = Depense::all()->count();
        
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

        // $depenses = Transaction::selectRaw('MONTH(date) as month, COUNT(*) as count')
        //                             ->whereYear('date', date('Y'))
        //                             ->groupBy('month')
        //                             ->orderBy('month')
        //                             ->get();
        $depenses = Transaction::selectRaw('MONTH(date) as month, SUM(montant) as total_amount')
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

            foreach($depenses as $depense){
                if($depense->month == $i){
                    $count = $depense->total_amount;
                    break;
                }
            }

            array_push($labels,$month);
            array_push($data,$count);
        }

        $datasets = [
            [
                'label'=>'depenses',
                'data'=>$data,
                'backgroundColor'=>$colors  
            ]
            ];

            // return view('charts', compact('datasets', 'labels'));

        return view('dashboard', compact('totalBudget', 'totalDepense', 'soldeRestant', 'totalCategorie', 
                'transactionsParCategorie', 'datasets', 'labels'));
    }


}