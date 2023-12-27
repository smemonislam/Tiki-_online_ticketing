<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTripRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'bus_id' => 'required|numeric',
            'location_id' => 'required|numeric',
            'departure_time' => 'required|string|max:255',
            'arrival_time' => 'required|string|max:255',
            'date' => 'required|date',
        ];
    }
}
