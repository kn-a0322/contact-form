<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|string|max:225',
            'email' => 'required|string|email|max:225',
            'tel' => 'required|numeric|digits_between:10,11',
            //numericは数字のみ入力可能(ハイフン不可)
            //digits_between:10,11は10桁から11桁の数字を入力可能（固定電話は10桁、携帯電話は11桁）
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'お名前を入力して下さい',
            'name.string' => 'お名前を文字列で入力して下さい',
            'name.max' => 'お名前は225文字以内で入力して下さい',
            'email.required' => 'メールアドレスを入力して下さい',
            'email.string' => 'メールアドレスを文字列で入力して下さい',
            'email.email' => 'メールアドレスを正しい形式で入力して下さい',
            'email.max' => 'メールアドレスは225文字以内で入力して下さい',
            'tel.required' => '電話番号を入力して下さい',
            'tel.numeric' => '電話番号を数字で入力して下さい',
            'tel.digits_between' => '電話番号は10桁から11桁で入力して下さい',
        ];
    }
}
