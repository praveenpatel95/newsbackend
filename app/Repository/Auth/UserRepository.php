<?php

namespace App\Repository\Auth;

use App\Models\User;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\AssignOp\Mod;

class UserRepository implements UserInterface
{
    protected User $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param array $data
     * @return User
     */
    public function create(array $data): Model|User
    {
        return $this->user->create($data);
    }

    public function getByEmail(string $email) : Model|User
    {
        return $this->user->where('email', $email)->first();
    }
}
