<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;
    // protected $table = 'comptes';

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
}
