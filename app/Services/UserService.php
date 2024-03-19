<?php

// app/Services/UserService.php


namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Datatables;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Rap2hpoutre\FastExcel\FastExcel;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        // return UserResource::collection(User::paginate());
        return $this->userRepository->getAllUsers();
    }

    public function getUserById($userId)
    {
        return $this->userRepository->getUserById($userId);
    }

    

    public function getUserDetails(Request $request)
    {

      // dd($request->user_id);
      $user = User::select('users.*',
              'roles_masters.roles_id as role_id',
              'roles_masters.name as role_name',
              'department_masters.name as department_name',
              'section_masters.name as section_name',
          )
        ->where('users.user_id', $request->user_id)
        ->leftJoin('roles_masters', 'users.role', '=', 'roles_masters.roles_id')
        ->leftJoin('image_masters', 'users.image', '=', 'image_masters.image_master_id')
        ->leftJoin('department_masters', 'users.department', '=', 'department_masters.department_id')
        ->leftJoin('section_masters', 'users.section', '=', 'section_masters.section_id')
        ->first();

        if (!$user) {
        abort(404); 
        }

        return $user;
    }

}
