<?php

namespace App\Http\Requests;

use App\Rules\isValidPassword;
use App\Rules\CustomEmailValidation;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'profile'=>'mimes:png,jpg,jpeg',
            'name' => 'required|unique:users,name',
            'email' => ['required','unique:users,email',new CustomEmailValidation()],
            'password' => ['required', 'string', new isValidPassword],
            'confirm_password' => 'required|same:password',
            'address' => 'required',
        ];
    }
}
