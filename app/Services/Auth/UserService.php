<?php

namespace App\Services\Auth;

use App\Exceptions\InvalidCredentialsException;
use App\Models\User;
use App\Repository\Auth\UserInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class UserService
{
    protected UserInterface $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * Create Account
     * @param array $data
     * @return User
     */

    public function register(array $data): Model|User
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userInterface->create($data);
    }

    /**
     * Check login and return user with token
     * @param array $data
     * @return Model|User
     * @throws InvalidCredentialsException if user detail does not valid
     */

    public function login(array $data): Model|User
    {
        $user = $this->userInterface->getByEmail($data['email']);
        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw new InvalidCredentialsException();
        }
        return $user->withToken();
    }
}
