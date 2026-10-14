<?php

namespace App\Http\Requests;

use App\Models\League;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StoreLeagueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', League::class);
    }

    protected function prepareForValidation(): void
    {
        $name = $this->input('name');
        
        $this->merge([
            'slug' => is_string($name) ? Str::slug($name) : null
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', Rule::unique('leagues', 'slug')],
        ];
    }

    public function messages(): array
    {
        return [
            'slug.required' => 'The name must contain at least one letter or number.',
            'slug.unique' => 'The name has already been taken.',
        ];
    }
}
