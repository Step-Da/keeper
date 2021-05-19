<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
            'name' => 'required|min:5|max:25',
        ];
    }

    public function attributes()
    {
        return[
            'name' => 'Нименование группы',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Поле наименование группы является обязательным',
            'name.min' => 'Название группы не может быть не менее 5 символов',
            'name.max' => 'Название группы не может быть больше 25 символов',
        ];
    }
}
