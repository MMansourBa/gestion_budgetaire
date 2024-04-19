<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonEngagement extends Model
{
    use HasFactory;
    protected $fillable = ['numero', 'designation', 'prix_unitaire', 'qte'];

}

