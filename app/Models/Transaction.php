<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [''];

    /**
     * Get the user that owns the Employer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function employer()
    public function depense()
    {
        return $this->belongsTo(Depense::class);
    }

    
    public function getSoldeDisponibleAttribute()
    {
        return $this->credits_alloues - $this->montant;
    }


    

}
