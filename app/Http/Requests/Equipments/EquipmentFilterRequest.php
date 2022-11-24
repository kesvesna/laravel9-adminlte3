<?php

namespace App\Http\Requests\Equipments;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentFilterRequest extends FormRequest
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
            'id' => '',
            'trk_id' => '',
            'equipment_status_id' => '',
            'system_type_id' => '',
            'room_id' => '',
            'equipment_name_id' => '',
            'comment' => '',
            'created_at' => ''
        ];
    }
}
