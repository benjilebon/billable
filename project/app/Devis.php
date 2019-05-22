<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    protected $fillable = [
        'corporate', 'name', 'address', 'postal_code', 'product_name', 'quantity', 'pu', 'tva', 'is_good_for_agreement', 'payment_conditions', 'is_validated'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function getTotalHT() {
        return $this->quantity * $this->pu;
    }
}
