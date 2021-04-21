<?php

namespace Modules\Library\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResourceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:resources,id',
            'file' => 'nullable|file|max:307200',
            'cover' => 'nullable|image|max:1024',
            'tags' => 'nullable|array',
            'tags.*' => 'string',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'author' => 'required|string',
            'year' => 'nullable|string|max:10',
            'is_public' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'theme_id' => 'required|exists:themes,id',
            'type' => 'required|string|max:128',
            'language' => 'required|string|in:ru,tj,en',
            'roles' => 'nullable|array',
            'roles.*' => 'string|exists:roles,id',
            'grades' => 'nullable|array',
            'grades.*' => 'string|exists:grades,id'
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
