<?php

namespace App\Http\Requests\Applications;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicationFromRequest extends FormRequest
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
            'application_status_id' => [ 'required', 'integer', 'min:1' ],
            'comment' => 'string',
            'service_id' => [ 'required', 'integer', 'min:1'],
            'notify_author' => [],
        ];
    }
}
