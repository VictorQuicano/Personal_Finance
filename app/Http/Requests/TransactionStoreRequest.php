<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'amount' => ['required', 'integer'],
            'is_payment' => ['required'],
            'account_nullable_user_categories_nullable_id' => ['required', 'integer', 'exists:account_nullable_user_categories_nullables,id'],
        ];
    }
}
