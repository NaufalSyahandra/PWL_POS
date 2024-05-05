<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BarangRequest extends FormRequest
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
                'kategori_id' => 'bail|required_without_all:barang_kode,barang_nama,harga_beli,harga_jual,image_barang|exists:m_kategori',
                'barang_kode' => 'bail|required_without_all:kategori_id,barang_nama,harga_beli,harga_jual,image_barang|unique:m_barang|string|min:3|max:10',
                'barang_nama' => 'required_without_all:kategori_id,barang_kode,harga_beli,harga_jual,image_barang|string|max:100',
                'harga_beli' => 'required_without_all:kategori_id,barang_kode,barang_nama,harga_jual,image_barang|integer',
                'harga_jual' => 'required_without_all:kategori_id,barang_kode,barang_nama,harga_beli,image_barang|integer',
                'image_barang' => 'required_without_all:kategori_id,barang_kode,barang_nama,harga_beli,harga_jual|integer'
            ];
        }

        return [
            'kategori_id' => 'bail|required|exists:m_kategori',
            'barang_kode' => 'bail|required|unique:m_barang,barang_kode, ' . $this->route('barang') . ',barang_id|string|min:3|max:10',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'image_barang' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Barang Validation data failed',
            'errors' => $validator->errors(),
        ], 422));
    }
}
