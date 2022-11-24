<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_status_id' => [ 'required', 'integer', 'min:1'],
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'string', 'min:3'],
            'password' => ['required', 'string', 'min:8'],
            'files' => ['nullable', 'max:10000'] // 10mb all files size
        ];
    }

//    public function messages()
//    {
//        return [
//            'comment.required' => 'Описание необходимо заполнить',
//        ];
//    }
}
