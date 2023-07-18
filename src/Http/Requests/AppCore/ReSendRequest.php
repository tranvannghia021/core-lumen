<?php

namespace Devtvn\Sociallumen\Http\Requests\AppCore;

use Devtvn\Sociallumen\Http\Requests\BaseRequest;

class ReSendRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=>'required'
        ];
    }
}
