<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonEngagement extends Model
{
    use HasFactory;
    protected $guarded = [''];

    // public function depense()
    // {
    //     return $this->belongsTo(Depense::class);
    // }

    
    public function getSoldeDisponibleAttribute()
    {
        return $this->credits_alloues - $this->montant;
    }
}

