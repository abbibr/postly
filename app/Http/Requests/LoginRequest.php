<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }

    public function authenticate() {
        if(RateLimiter::tooManyAttempts('limit', $perMinute = 5)) {
            $seconds = RateLimiter::availableIn('limit');

            throw ValidationException::withMessages([
                'limit' => "Too many attempts! Please, try again after $seconds seconds."
            ]);
        }

        return;
    }
}
