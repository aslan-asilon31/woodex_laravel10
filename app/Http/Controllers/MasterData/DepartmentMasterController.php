<?php

namespace App\Http\Controllers\masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\StatusMaster;
use App\Models\MasterData\DepartmentMaster;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Alert;

class DepartmentmasterController extends Controller
{
    public function index()
    {
        $isActive = 'department' ;
        $slugs = 'Master Data > Department' ;

        $departments = DepartmentMaster::latest()->paginate(5);
        $statuses = StatusMaster::all();
        $username = Auth::user()->name;
        $userrole = Auth::user()->role;

        //return view with data
        // return view('masterdata.departmentmaster', compact('isActive','username','userrole','slugs','departments'))
        //     ->layout('components.layouts.app_backend', ['isActive' => $isActive,'departments' => $departments,'username' => $username, 'userrole' => $userrole]);

        return view('masterdata.departmentmaster', compact('statuses','isActive','username','userrole','slugs','departments'));


    }
}
