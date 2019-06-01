<?php

namespace App;

use App\Notifications\TemplateEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Facture extends Model
{

    use Notifiable;

    protected $table = 'facture';

    protected $fillable = [
        'client_address',
        'status'
    ];

    public function getRelance() {
        return $this->created_at->addDays(15*($this->status+1))->diffForHumans();
    }

    public function getNumberOfRelances() {
        switch ($this->status) {
            case 0:
                return '1ère';
                break;
            case 1:
                return '2ème';
                break;
            case 2:
                return '3ème';
                break;  
        }
    }

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
