<?php

namespace App\Http\Requests\Trks;

use Illuminate\Foundation\Http\FormRequest;

class TrkFilterRequest extends FormRequest
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
            'trk_id' => '',
            'room_id' => '',
            'room_name' => '',
            'building_id' => '',
            'floor_id' => ''
        ];
    }
}
