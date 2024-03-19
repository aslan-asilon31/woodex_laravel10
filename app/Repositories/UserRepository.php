<?php

// app/Repositories/UserRepository.php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($userId)
    {
        return User::find($userId);
    }

    // Other methods related to user data manipulation
}
