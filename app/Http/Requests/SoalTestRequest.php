<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class SoalTestRequest extends FormRequest
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
                 
                'modul_id' => 'nullable|exists:modul,id', 
                'section_id' => 'nullable|exists:section,id', 
                'test_id' => 'nullable|exists:test,id', 
                'pertanyaan' => 'required|string',
                'jawaban_benar' => 'required|string',

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
