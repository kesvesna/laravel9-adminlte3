<?php

namespace App\Http\Requests\Acts;

use Illuminate\Foundation\Http\FormRequest;

class StoreActFormRequest extends FormRequest
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
            'application_id' => ['numeric', 'min:1'],
            'date' => ['required'],
            'system_type_id' => ['required', 'numeric', 'min:1'],
            'Equipment' => ['required', 'array', 'min:1'],
            'Equipment.*.id' => ['required', 'numeric', 'min:1'],
            'Equipment.*.work_ids' => ['required', 'array', 'min:1'],
            'Equipment.*.work_ids.*.id' => ['required', 'numeric', 'min:1'],
            'Equipment.*.work_ids.*.spare_part_ids' => ['required', 'array', 'min:1'],
            'Equipment.*.work_ids.*.spare_part_ids.*.id' => ['numeric', 'min:1', 'nullable'],
            'Equipment.*.work_ids.*.spare_part_ids.*.count' => ['numeric', 'min:0', 'nullable'],
            'Equipment.*.work_ids.*.spare_part_ids.*.model' => ['string', 'min:2', 'nullable'],
            'Equipment.*.work_ids.*.spare_part_ids.*.comment' => ['string', 'min:2', 'nullable'],
            'Equipment.*.works' => ['string', 'min:2', 'max:10000', 'nullable'],
            'Equipment.*.remarks' => ['string', 'min:2', 'max:10000', 'nullable'],
            'Equipment.*.recommendations' => ['string', 'min:2', 'max:10000', 'nullable'],
            'Equipment.*.spare_parts' => ['string', 'min:2', 'max:10000', 'nullable'],
            'Equipment.*.files' => ['nullable', 'array', 'min:1'],
        ];
    }
}
