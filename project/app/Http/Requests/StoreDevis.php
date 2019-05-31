<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDevis extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'corporate'             => ['required', 'string', 'max:255'],
            'name'                  => ['required', 'string', 'max:255'],
            'address'               => ['required', 'string', 'max:255'],
            'postalcode'            => ['required', 'numeric'],
            'email'                 => ['required', 'email'],
            'productname'           => ['required', 'string', 'max:255'],
            'quantity'              => ['required', 'numeric'],
            'pu'                    => ['required', 'string', 'max:255'],
            'tva'                   => ['required'],
            'project-name'          => ['required', 'string', 'max:255'],
            'payment_conditions'    => ['required'],
            'contact'               => ['required', 'email'],
            'phone'                 => ['required', 'numeric'],                
            'rcs'                   => ['required', 'string'],
            'intracommunitytva'     => ['required', 'string'],
            'city'                  => ['required', 'string'],
        ];
    }
}
