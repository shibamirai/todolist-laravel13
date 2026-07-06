<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TodoItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        // ログインしていればOK
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'item_name' => ['required', 'max:100'],
            'user_id' => ['required', Rule::exists('users', 'id')],
            'expire_date' => ['required', 'date'],
        ];
    }

    public function messages()
    {
        return [
            'item_name.required' => '項目名を入力してください',
            'item_name.max' => '項目名はmax文字以下にしてください',
            'user_id.required' => '担当者を選択してください',
            'user_id.exists' => '選択された担当者が存在しません',
            'expire_date.required' => '期限を入力してください',
            'expire_date.date' => '期限日のフォーマットが不正です',
        ];
    }
}
