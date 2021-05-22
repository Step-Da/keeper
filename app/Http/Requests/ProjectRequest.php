<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'name' => 'required|min:5|max:35',
            'description' => 'required|min:15|max:100',
            'path' => 'required|min:5|max:35|alpha_num|regex:/^[A-Za-z0-9]+$/i',
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
            'name' => 'Наименование программного проекта',
            'description' => 'Описание программного проекта',
            'path' => 'Наименование директории'
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
            'name.required' => 'Поле наименование программного проекта является обязательным',
            'name.min' => 'Название программного проекта не может быть меньше 5 символов',
            'name.max' => 'Название программного проекта не млжет быть больше 35 символов',
            'description.required' => 'Необходимо дать минимально описание нового программного проекта',
            'description.min' => 'Описание проекта должно быть больше 15 символов',
            'description.max' => 'Описание проекта не должно быть больше 100 символов',
            'path.required' => 'Необходимо указать наименование проектной директории',
            'path.min' => 'Название проектной директории не может быть меньше 5 символов',
            'path.max' => 'Название проектной директории не млжет быть больше 35 символов',
            'path.regex' => 'Неправильно указано название проектной директории',
            'path.alpha_num' => 'В названии проектной директории можно указать только цифры и латинские буквы',
        ];
    }
}
