<?php

namespace App\Http\Requests;

use App\ValueObjects\Location;
use Illuminate\Foundation\Http\FormRequest;

class DriverAssignRequest extends FormRequest
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
            'lng' => ['required', 'numeric', 'min:-180', 'max:180'],
            'lat' => ['required', 'numeric', 'min:-90', 'max:90'],
        ];
    }

    public function validated($key = null, $default = null): Location
    {
        $data = parent::validated($key, $default);

        return new Location($data['lng'], $data['lat']);
    }
}
