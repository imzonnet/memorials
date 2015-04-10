<?php namespace App\Components\Memorials\Http\Requests;

use App\Http\Requests\Request;

class ServiceFormRequest extends Request
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
            'title'     =>  'required',
            'url'       =>  'required|checkUrl'
        ];

        return $rules;
    }

}
