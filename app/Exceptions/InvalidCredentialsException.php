<?php

namespace App\Exceptions;
use App\Helpers\JsonResponse;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Request;

class InvalidCredentialsException extends Exception
{
    use ApiResponse;
    public function render(Request $request)
    {
        return $this->error(__('auth.failed'), 401);
    }
}
