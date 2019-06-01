<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{

    protected $table = 'facture';

    protected $fillable = [
        'client_address',
        'status'
    ];

    public function getRelance() {
        return $this->created_at->addDays(15*$this->status+1)->diffForHumans();
    }

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
