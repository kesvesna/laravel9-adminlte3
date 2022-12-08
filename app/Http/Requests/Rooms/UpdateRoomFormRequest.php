<?php

namespace App\Http\Requests\Rooms;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomFormRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2'],
            'room_type_id' => ['required', 'numeric', 'min:1'],
            'comment' => ['string', 'min:2', 'nullable'],
            'slug' => ['required', 'string', 'min:2'],
        ];
    }
}
