<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Depense extends Model
// {
//     use HasFactory;
// }


use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
