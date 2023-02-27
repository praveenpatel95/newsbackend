<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Services\Auth\UserService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    use ApiResponse;
    protected UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Create new user
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function register(UserRequest $request) : JsonResponse
    {
        return $this->success($this->userService->register($request->all()));
    }

    /**
     * Login attempt
     * @param LoginRequest $request
     * @return JsonResponse
     * @throws \App\Exceptions\InvalidCredentialsException
     */
    public function login(LoginRequest $request) : JsonResponse
    {
        return $this->success($this->userService->login($request->all()));
    }

}
