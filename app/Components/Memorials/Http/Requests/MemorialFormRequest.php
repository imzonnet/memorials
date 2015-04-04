<?php namespace App\Components\Memorials\Http\Requests;

use App\Http\Requests\Request;

class MemorialFormRequest extends Request {

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
        $birthday = $this->get('birthday');
        if($this->method() == 'PUT') {
            $avatar = 'image';
        } else {
            $avatar = 'required|image';
        }
        $rules = [
            'name'      => 'required',
            'avatar'    => $avatar,
            'birthday'  => 'required|date_format:"Y-m-d"',
            'death'     => 'required|date_format:"Y-m-d"|after:'.$birthday
        ];

        $timeline = $this->get('timeline');
        if($timeline == 1) {
            $count = $this->get('timeline_form_count');
            for($i=0; $i < $count; $i++) {
                $rules['timeline_year.'.$i] = 'required|date_format:"Y"';
                $rules['timeline_title.'.$i] = 'required';
            }
        }

		return $rules;
	}

    public function messages() {

        $msgs = [];
        $count = $this->get('timeline_form_count');
        for($i=0; $i < $count; $i++) {
            $msgs['timeline_year.'.$i.'.required'] = 'The timeline year field is required at timeline group '.$i;
            $msgs['timeline_title.'.$i.'.required'] = 'The timeline title field is required at timeline group '.$i;
        }

        return $msgs;
    }
}
