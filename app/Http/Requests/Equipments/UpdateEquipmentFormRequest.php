<?php

namespace App\Http\Requests\Equipments;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipmentFormRequest extends FormRequest
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
            'equipment_status_id' => [ 'required', 'integer', 'min:1' ],
            'comment' => 'string',
            'system_type_id' => [ 'required', 'integer', 'min:1'],
            'room_id' => ['required', 'integer', 'min:1'],
            'visible' => '',
            'equipment_name_id' => ['required', 'integer', 'min:1']
        ];
    }
}
