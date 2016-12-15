<?php

namespace App\Http\Requests\Publications;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title'                            => 'required|max:255',
            'slug'                             => 'required|alpha_dash|max:255|unique:publications,slug,NULL,id,deleted_at,NULL',
            'short_description'                => 'max:1000',
            'description'                      => 'required',
            'is_active'                        => 'required|in:1,0',
        ];
    }
}
