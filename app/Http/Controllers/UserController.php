<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Datatables;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Rap2hpoutre\FastExcel\FastExcel;

use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function index(){
        $users = $this->userService->getAllUsers();
        return view('users.index',compact('users'));
    }

    public function export()
    {

        // Load users
        $users = User::all();
        // Export all users
        (new FastExcel($users))->export('file.xlsx');

    }

    public function getdata(){

        if(request()->ajax()) {

            $query = "SELECT a.user_id as user_id,a.name,a.email,c.image as image,a.created_at, b.name as role_name 
                        FROM users a
                        LEFT JOIN roles_masters b ON a.role = b.roles_id
                        LEFT JOIN image_masters c ON a.image = c.image_master_id
                    ";

            $users = DB::connection('mysql')->select($query);

            return datatables()->of($users)
            ->addColumn('action', function ($user) {
                return view('users.action', ['user' => $user]);
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);

        }

    }

    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            // 'image'     => 'required|image|mimes:png,jpg,jpeg',
            'image'     => 'required',
            'password' => 'nullable|min:8|confirmed',
        ]);

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/users', $image->hashName());

        $user = new User;
        
        $latestUser = User::latest()->first();
        $lastId = null;

        if ($latestUser) {
            $lastId = $latestUser->id + 1 ;
        } else {
            $lastId = 1;
        }
        

        if(empty($request->role)){
            $request->role = 3;
        }

        if(empty($request->password)){
            $request->password = Hash::make($request['name']);
        }

        $user->user_id = $lastId;
        $user->name = $request->name;
        $user->image = $request->image;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;

        $user->save();
     
        return redirect()->route('users.index')
                        ->with('success','User has been created successfully.');
    }


    public function show(Request $request)
    {

    
        return view('users.show',compact('user'));
    }


    public function edit(Request $request)
    {
        // dd($request);
        $user = $this->userService->getUserDetails($request);
        
    
        return view('users.edit_advance',compact('user'));
    }

    public function update(Request $request,User $user)
    {
        // dd($user);
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        
        // $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
    
        return redirect()->route('users.index')
                        ->with('success','User Has Been updated successfully');
    }

    public function destroy(Request $request)
    {
        $user = User::where('id',$request->id)->delete();
     
        return Response()->json($user);
    }

}
