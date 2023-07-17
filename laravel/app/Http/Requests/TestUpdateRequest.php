<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
             'name' => 'required|string|unique:test,name',
             'description' => 'required|max:256',
             'category_id' => 'required|integer|exists:categories,id',
             'user_id' => 'required|integer|exists:users,id',
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
        ];    
    }


    public function attributes(): array
    {
        return[
            'name' => 'ИМЯ',
            'description' => 'ОПИСАНИЕ',
            'category_id' => 'ID КАТЕГОРИИ',
            'user_id' => 'ID ПОЛЬЗОВАТЕЛЯ',
        ];
    }
}
