<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mandat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'somme',
        'annee',
        'date',
        'numero_be',
        'numero_mandat',
        'classe',
        'cp',
        'cd',
        'compte',
        'objet',
    ];

    public function bonEngagement()
    {
        return $this->belongsTo(BonEngagement::class, 'numero_be');
    }
}
