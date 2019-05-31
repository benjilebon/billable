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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'clientname'            => ['required', 'email'],            
            'clientaddress'         => ['required', 'email'],             
            'contact'               => ['required', 'email'],         
            'projectname'           => ['required', 'string', 'max:255'],             
            'corporate'             => ['required', 'string', 'max:255'],         
            'address'               => ['required', 'string', 'max:255'],         
            'postalcode'            => ['required', 'number'],             
            'city'                  => ['required', 'string'],     
            'phone'                 => ['required', 'number'],     
            'email'                 => ['required', 'email'],     
            'rcs'                   => ['required', 'string'],     
            'intracommunitytva'     => ['required', 'string']                 
        ];
    }
}
