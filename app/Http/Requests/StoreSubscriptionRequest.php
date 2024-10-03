<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriptionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => ['required', 'string', 'min:1'],
            'plan_id' => ['required', 'string', 'min:1'],
            'months' => ['required', 'string', 'min:1'],
        ];
    }
}