<?php

namespace Devtvn\Sociallumen\Http\Requests\AppCore;

use Devtvn\Sociallumen\Http\Requests\BaseRequest;

class RegisterRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return config('social.custom_request.app.register');
    }
}
