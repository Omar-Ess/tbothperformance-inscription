<?php

namespace App\Http\Requests\Lead;

use App\Enums\ProfessionalSituation;
use App\Enums\YearsWorkedInFrance;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreUpdateLeadRequest extends FormRequest
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
            "first_name" => "required",
            "last_name" => "required",
            "email" => ["required", "email", Rule::unique('leads')->ignore($this->lead?->id)],
            "phone" => "required",
            "years_worked_in_france" => ["required", new Enum(YearsWorkedInFrance::class)],
            "professional_situation" => ["required", new Enum(ProfessionalSituation::class)],
            "terms" => ["required", "boolean", "accepted", Rule::excludeIf($this->lead ? true : false)]
        ];
    }
}
