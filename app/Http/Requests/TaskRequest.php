<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'description' => 'required|min:15',
            'type' => 'required',
            'level' => 'required',
            'endpoint' => 'required',
            'worker' => 'required',
            'group' => 'required', 
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
            'name' => 'Наименование проектной задачи',
            'description' => 'Описание проектной задачи',
            'type' => 'Тип проектной задачи',
            'level' => 'Уровень проектной задачи',
            'endpoint' => 'Дата выполнения проектной задачи',
            'worker' => 'Работник',
            'group' => 'Логическая группа',
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
            'name.required' => 'Поле наименование проектной задачи является обязательным',
            'name.min' => 'Название задачи не может быть меньше 5 символов',
            'name.max' => 'Название задачи не может быть больше 35 символов',
            'description.required' => 'Необходимо дать минимально описание проектной задачи',
            'description.min' => 'Описание задачи должно быть больше 15 символов',
            'type.required' => 'Необходимо указать тип новой проектной задачи',
            'level.required' => 'Необходимо указать приоритет новой проектной задачи',
            'endpoint.required' => 'Необходимо указать итогувую дату выполнения проектной задачи',
            'worker.required' => 'Укажите работника (сотрудника) для выполнения новой проектной задачи',
            'group.required' => 'Необходимо указать стартовую логическую группу для новой проектной задачи',
        ];
    }
}
