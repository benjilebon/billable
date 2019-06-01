<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFacture extends FormRequest
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
            'clientname'            => ['required'],            
            'clientaddress'         => ['required'],             
            'contact'               => ['required', 'email'],         
            'projectname'           => ['required', 'string'],             
            'corporate'             => ['required', 'string'],         
            'address'               => ['required', 'string'],         
            'postalcode'            => ['required', 'numeric'],             
            'city'                  => ['required', 'string'],     
            'phone'                 => ['required', 'numeric'],     
            'email'                 => ['required', 'email'],     
            'rcs'                   => ['required', 'string'],     
            'intracommunitytva'     => ['required', 'string']                 
        ];
    }
}
