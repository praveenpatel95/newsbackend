<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
class ValidationRequestException extends Exception
{
    use ApiResponse;
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function render() : JsonResponse
    {
        return $this->error(
           json_decode($this->message),
        422
        );
    }
}
