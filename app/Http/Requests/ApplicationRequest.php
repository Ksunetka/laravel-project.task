<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'name' => ['required','regex:/(^[a-zA-Zа-яёА-ЯЁ ]+$)/u'],
            'phone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/'],
            'company' => ['required'],
            'message' => ['required','max:280'],
            'file' => ['required','mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf,docx','max:2048'],
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Вы не ввели имя',
            'name.regex' => 'Поле должно содержать только буквы',
            'phone.required' => 'Укажите номер телефона',
            'phone.regex' => 'Номен телефона введен некорректно',
            'company.required' => 'Введите название компании',
            'message.required' => 'Введите сообщение',
            'message.max' => 'Сообщение должно содержать не более 280 символов',
            'file_path.required' => 'Вы не добавили файл',
            'file_path.mimes' => 'Форматы файла: png,jpg,jpeg,csv,txt,xlx,xls,pdf,docx',
            'file_path.max' => 'Максимальная длина названия файла 2048 символов',
        ];
    }
}
