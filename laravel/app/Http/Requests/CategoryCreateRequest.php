<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:5',
            'image' => 'required|mimes:jpg,png,jpeg|max:2048|dimensions:min_width=500,min_height=500,max_width=2000,max_height=2000',
        ];
    }

    public function message() {
        return[
            'required' => 'Поле :attribute не должно быть пустым',
            'string' => 'Поле :attribute должно имееть строчное значение',
            'min' => [
                'string' => 'Поле :attribute содержит менее :min символа(-ов)'
            ],
            'max' => [
                'string' => 'Поле :attribute содержит менее :min символов'
            ],
        ];
    }

    public function attributes() {
        return[
            'name' => 'ИМЯ КАТЕГОРИИ',
            'image' => 'ИЗОБРАЖЕНИЕ',
        ];
    }
}