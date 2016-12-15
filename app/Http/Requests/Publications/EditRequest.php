<?php

namespace App\Http\Requests\Publications;

class EditRequest extends AddRequest
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
        $publication = $this->route('controlPublication');

        return array_merge(parent::rules(), [
            'slug' => 'required|alpha_dash|max:255|unique:publications,slug,' . $publication->getKey() . ',id,deleted_at,NULL',
        ]);
    }
}
