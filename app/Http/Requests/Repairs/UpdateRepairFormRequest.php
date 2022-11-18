<?php

namespace App\Http\Requests\Repairs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRepairFormRequest extends FormRequest
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
            'plan_date' => ['required', 'date'],
            'trk_id' => ['required', 'integer', 'min:1'],
            'service_id' => ['required', 'integer', 'min:1'],
            'comment' => ['required', 'string'],
            'application_id' => ['nullable', 'integer', 'min:1'],
            'responsible_user_id' => ['required', 'integer', 'min:1'],
            'user_id' => ['nullable', 'integer', 'min:1'],
            'repair_status_id' => ['nullable', 'integer', 'min:1']
        ];
    }
}
