<?php namespace App\Components\Dashboard\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            // Update operation, exclude the record with id from the validation:
            $valid = [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $this->get('id'),
                'password' => 'confirmed|min:6',
                'avatar'    => 'image'
            ];
        } else {
            // Create operation. There is no id yet.
            $valid = [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|confirmed|min:6',
                'avatar'    => 'required|image'
            ];
        }
        return $valid;
    }

}
