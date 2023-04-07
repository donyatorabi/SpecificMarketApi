<?php

namespace Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'nullable',
                'regex:/^[\x{0600}-\x{06FF}\s0-9]+$/u',
                'max:50'
            ],
            'content' => [
                'nullable',
                'string',
                'max:100'
            ],
            'categoryId' => [
                'nullable',
                'integer',
                'min:1'
            ]
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
