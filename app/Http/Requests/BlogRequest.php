<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //ここをtrueにすることで、全てのユーザーがこのリクエストを使用できるようになります。
        return true;
    }

    public function rules(): array
    {
        //フォームのバリデーションルールを定義します。
        return [
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        //各バリデーションに対するエラーメッセージを定義します。
        return [
            'title.required' => 'タイトルは必須です。',
            'title.max' => 'タイトルは255文字以内で入力してください。',
            'content.required' => '内容は必須です。',
            'image.image' => '画像ファイルを選択してください。',
            'image.mimes' => '画像はjpeg, png, jpg, gif, svg形式でアップロードしてください。',
            'image.max' => '画像のサイズは2MB以内にしてください。',
        ];
    }
}
