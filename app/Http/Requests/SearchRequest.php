<?php

namespace App\Http\Requests;

use Illuminate\Validation\Validator;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            if (Str::wordCount($this->get('search')) > 2) {
                $validator->errors()->add('search', 'You can search only by 2 words');
            }
        });
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'search' => ['required'],
            'countOfWord' => ['required', 'integer'],
        ];
    }
}
