<?php namespace App\Components\Flowers\Http\Requests;

use App\Http\Requests\Request;

class FlowerFormRequest extends Request
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
        if ($this->method() == 'PUT') {
            $image = 'image';
        } else {
            $image = 'required|image';
        }

        $rules = [
            'title'     =>  'required',
            'price'     =>  'required|numeric',
            'stock'     =>  'numeric'
        ];
        $flowers = $this->get('flower_title');
        $flower_ids = $this->get('flower_id');
        foreach($flowers as $i => $flower) {
            if($flower_ids[$i] == 0) $image = 'required|image';
            $rules['flower_title.' . $i] = 'required';
            $rules['flower_image.' . $i] = $image;
        }


        return $rules;
    }

    public function messages()
    {
        $messages = [];
        $flowers = $this->get('flower_title');
        $i = 1;
        foreach($flowers as $index => $flower) {
            $messages['flower_image.' . $index . '.required'] = 'The flower image field is required at flower group ' . $i;
            $messages['flower_title.' . $index . '.required'] = 'The flower title field is required at flower group ' . $i;
            $i++;
        }
        return $messages;
    }
}
