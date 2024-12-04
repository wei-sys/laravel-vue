<?php

namespace App\Http\Rest;

use Exception;
use Illuminate\Foundation\Http\FormRequest;

class ApiResponseException extends Exception
{
    use Response; 
    
    protected $data;
    protected $status;

    public function __construct($message, $code, $data = null, $status = 400)
    {
        parent::__construct($message);
        $this->data = $data;
        $this->status = $status;
        $this->code = $code;
    }

    public function render($request)
    {
        return $this->error($this->getMessage(), $this->code, $this->status, $this->data);
    }
}

class Request extends FormRequest
{
    protected $errMsg;
    /**
     * Validation for api requests and decryption
     *
     * @return array
     * @throws \App\Http\Controllers\ApiResponseException
     */
    public function ApiValidate($rules, $params = [])
    {
        try {
            return $this->validate($rules, $params);
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw new ApiResponseException($this->errMsg ?? 'Validation Errors', 1001, $e->errors(), 422);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 1001);
      }
    }

    public function error_message($message)
    {
        $this->errMsg = $message;
        return $this;
    }
}