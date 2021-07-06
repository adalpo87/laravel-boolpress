<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            /* regole */
            'title'=>'required|max:255',
            'content'=>'required|min:3',
            'category_id' => 'nullable|exists:categories,id',
            'tags_id' => 'nullable|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Il campo è vuoto, devi scrivere qualcosa',
            'title.max'=>'Il testo deve avere un massimo di :max caratteri',
            'content.required'=>'Il contenuto è vuoto, devi scrivere qualcosa',
            'content.min'=>'Il testo deve avere almeno :min caratteri',
            'category_id.exists' => 'Non è presente la categoria scelta',
            'tags_exists' => 'Il tag scelto non è presente'
        ];
    }
}
