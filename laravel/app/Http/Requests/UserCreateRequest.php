<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
             'name' => 'required|string|unique:users,name',
             'email' => 'required|max:200|email:rfc,dns|unique:users,email',
             'password' => 'required|string|min:8|regex:/[0-9]/|regex:/[A-Z]/',
        ];
    }

    public function message(): array
    {
        return[
            'required' => 'Поле :attribute не должно быть пустым',
            'string' => 'Поле :attribute должно имееть строчное значение',
            'min' => [
                'string' => 'Поле :attribute содержит менее :min символа(-ов)'
            ],
            'max' => [
                'string' => 'Поле :attribute содержит менее :min символов'
            ],
            'email' => [
                'rfc' => 'Поле :attribute содержит менее :min символа(-ов)',
                'dns' => 'Поле :attribute содержит менее :min символа(-ов)',
            ]
        ];    
    }


    public function attributes(): array
    {
        return[
            'name' => 'ИМЯ',
            'email' => 'ПОЧТА',
            'password' => 'ПАРОЛЬ',
        ];
    }
}
