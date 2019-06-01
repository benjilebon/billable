<?php

namespace App;

use App\Notifications\TemplateEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Devis extends Model
{

    use Notifiable;

    protected $fillable = [
        'corporate', 
        'name', 
        'address', 
        'postal_code', 
        'email', 
        'product_name', 
        'quantity', 
        'pu', 
        'tva', 
        'project_name', 
        'payment_conditions', 
        'is_validated', 
        'contact',
        'phone',
        'rcs',
        'tva',
        'intra_community_tva',
        'city'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function getTotalHT() {
        return $this->quantity * $this->pu;
    }

    public function getTotalTTC() {
        return (float) ($this->getTotalHT()*(float) '1.'.$this->tva);
    }

    public function paymentConditionsAsString() {
        switch ($this->payment_conditions) {
            case 0:
                return 'Acompte à la signature';
                break;
            case 1:
                return 'Paiement comptant';
                break;
        }
    }

}


