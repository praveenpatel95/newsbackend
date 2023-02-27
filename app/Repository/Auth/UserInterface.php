<?php

namespace App\Repository\Auth;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

interface UserInterface
{
    function create(array $data) : Model|User;

    function getByEmail(string $email) : Model|User;
}
