<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{

    public $table = 'dossier';

    protected $fillable = [
        'corporate', 'name', 'address', 'postal_code', 'devis', 'facture'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
