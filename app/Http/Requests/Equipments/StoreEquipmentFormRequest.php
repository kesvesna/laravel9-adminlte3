<?php

namespace App\Http\Requests\Equipments;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipmentFormRequest extends FormRequest
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
            'trk_id' => [ 'required', 'integer', 'min:1' ],
            'building_id' => [ 'required', 'integer', 'min:1'],
            'floor_id' => [ 'required', 'integer', 'min:1'],
            'room_id' => [ 'required', 'integer', 'min:1'],
            'equipment_name_id' => [ 'required', 'integer', 'min:1'],
            'equipment_status_id' => [ 'required', 'integer', 'min:1'],
            'system_type_id' => [ 'required', 'integer', 'min:1'],
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
