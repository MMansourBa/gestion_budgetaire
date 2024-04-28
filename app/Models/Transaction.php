<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['depense_id', 'numero_compte', 'intitules', 'credits_alloues', 'numero_bon', 
    'intitule', 'montant', 'payes', 'date'];

    public function compte()
    {
        return $this->belongsTo(Compte::class);
    }

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }

    public function depense()
    {
        return $this->belongsTo(Depense::class);
    }

    
    public function getSoldeDisponibleAttribute()
    {
        return $this->credits_alloues - $this->montant;
    }


    

}
