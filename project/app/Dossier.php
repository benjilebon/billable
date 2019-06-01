<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{

    public $table = 'dossier';

    protected $fillable = [
        'corporate', 'name', 'address', 'postal_code', 'devis', 'facture', 'devis_id', 'facture_id'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
