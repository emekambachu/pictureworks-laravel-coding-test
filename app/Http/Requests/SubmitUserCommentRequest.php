<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;

class SubmitUserCommentRequest extends FormRequest
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
        $staticPassword = '00000000';
        return [
            'password' => 'required|in:'.$staticPassword,
            'comment' => 'required',
        ];
    }

    public function messages(){
        return [
            'password.required' => 'Password is required!',
            'password.in' => 'Incorrect Password!',
            'comment.required' => 'Comment is required!',
        ];
    }

    protected function failedValidation(Validator $validator){
        // return errors in json object/array
        $message = $validator->errors()->all();
        throw new HttpResponseException(response()->json([
                'success' => false,
                'errors' => $message
            ]));
    }
}
