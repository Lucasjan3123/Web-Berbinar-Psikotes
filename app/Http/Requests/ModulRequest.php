<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class ModulRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'nama_modul' => 'sometimes|required|string', // Optional, tapi jika ada, harus dalam bentuk string
            'test_id' => 'integer', 
            'jumlah_soal_perModul' => 'sometimes|required|integer', // Optional, tapi jika ada, harus dalam bentuk integer
        ];
    }

    public function failedValidation(Validator $validator) 
    {
        throw new HttpResponseException(
            response()->json([
                'status' => Response::HTTP_BAD_REQUEST,
                'message' => 'Validation errors, please check your input',
                'errors' => $validator->errors(),
            ])
        );
    }
}
