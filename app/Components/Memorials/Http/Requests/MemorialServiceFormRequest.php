<?php namespace App\Components\Memorials\Http\Requests;

use App\Http\Requests\Request;

class MemorialServiceFormRequest extends Request
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

        $rules = [
            'contact_name'     =>  'required',
            'contact_email'     =>  'required|email',
            'contact_phone'     =>  'required|numeric',
        ];

        return $rules;
    }

}
