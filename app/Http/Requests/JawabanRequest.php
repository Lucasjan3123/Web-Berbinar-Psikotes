<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class JawabanRequest extends FormRequest
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
            'jawaban' => 'required|array',
            'jawaban.*.user_id' => 'nullable|integer|exists:users,id',

            // 'jawaban.*.user_id' => 'required|integer|exists:users,id',
            'jawaban.*.soal_id' => 'required|integer|exists:soal,id',
            'jawaban.*.option_pilihan_ganda_id' => 'nullable|integer|exists:option_pilihan_ganda,id',  
            'jawaban.*.jawaban_statement_id' => 'nullable|integer|exists:jawaban_statement,id',
            'jawaban.*.jawaban_essay' => 'nullable|string',
            'jawaban.*.jawaban_berupa_angka' => 'nullable|int',
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
