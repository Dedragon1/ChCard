<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableObjectUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
             'test_id' => 'required|integer|exists:test,id',
             'name' => 'required|string',
             'description' => 'max:50',
             'image' => 'required|mimes:jpg,png,jpeg|max:2048|dimensions:min_width=500,min_height=500,max_width=2000,max_height=2000',         
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
            'test_id' => 'ID ТЕСТА',
            'name' => 'ИМЯ',
            'description' => 'ОПИСАНИЕ',
            'image' => 'ИЗОБРАЖЕНИЕ',            
        ];
    }
}
