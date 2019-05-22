<?php

namespace App;

use App\Notifications\TemplateEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Devis extends Model
{

    use Notifiable;

    protected $fillable = [
        'corporate', 'name', 'address', 'postal_code', 'email', 'product_name', 'quantity', 'pu', 'tva', 'is_good_for_agreement', 'payment_conditions', 'is_validated'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function getTotalHT() {
        return $this->quantity * $this->pu;
    }

}


