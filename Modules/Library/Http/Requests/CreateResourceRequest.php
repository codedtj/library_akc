<?php

namespace Modules\Library\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateResourceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'nullable|string',
            'author' => 'required|string',
            'year' => 'nullable|string',
            'is_public' => 'required|boolean',
            'file' => 'required|file',
            'cover' => 'required|image',
            'tags' => 'array',
            'tags.*' => 'string'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
