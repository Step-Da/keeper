<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
{
    /**
     * Определение возможности пользователя для создания новой записи
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Получение правил проверки, применимые к запросу
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:25',
        ];
    }

    /**
     * Получение наименований атрибутов модели
     * 
     * @return array
     */
    public function attributes()
    {
        return[
            'name' => 'Нименование группы',
        ];
    }

    /**
     * Получение сообщений при возникновении ошибки валидации 
     * 
     * @return array
     */
    public function messages()
    {
        return[
            'name.required' => 'Поле наименование группы является обязательным',
            'name.min' => 'Название группы не может быть не менее 5 символов',
            'name.max' => 'Название группы не может быть больше 25 символов',
        ];
    }
}
