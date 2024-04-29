<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mandat extends Model
{
    use HasFactory;
    protected $fillable = [
        'beneficiaire',
        'date',
        'numero_mandat',
        'montant',
        'objet',
    ];

    public function bonEngagement()
    {
        return $this->belongsTo(BonEngagement::class, 'numero_bon');
        return $this->belongsTo(BonEngagement::class, 'beneficiaire');
        return $this->belongsTo(BonEngagement::class, 'intitules');
        return $this->belongsTo(BonEngagement::class, 'montant');
    }
}
