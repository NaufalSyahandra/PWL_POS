<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if (in_array($this->getMethod(), ['PUT', 'PATCH'])) {
            return [
                'username' => 'bail|required_without_all:nama,password,level_id,image|unique:m_user',
                'nama' => 'required_without_all:username,password,level_id,image',
                'password' => 'required_without_all:username,nama,level_id,image',
                'level_id' => 'required_without_all:username,nama,password,image',
                'image' => 'required_without_all:username,nama,password,level_id'
            ];
        }

        return [
            'username' => 'unique:m_user|required',
            'password' => 'required',
            'nama' => 'required',
            'level_id' => 'required',
            'image' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'User Validation data failed',
            'errors' => $validator->errors(),
        ], 422));
    }
    protected function passedValidation(): void
    {
        if ($this->has('password')) {
            $this->merge(['password' => bcrypt($this->input('password'))]);
        }
    }
}
