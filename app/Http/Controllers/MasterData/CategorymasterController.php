<?php

namespace App\Http\Controllers\masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\CategoryMaster;
use App\Models\MasterData\StatusMaster;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Alert;


class CategorymasterController extends Controller
{
    public function index()
    {
        $isActive = 'category' ;
        $slugs = 'Dashboard > Category' ;

        $categories = CategoryMaster::latest()->paginate(5);
        $statuses = StatusMaster::all();
        $username = Auth::user()->name;
        $userrole = Auth::user()->role;

        //return view with data
        // return view('masterdata.categorymaster', compact('statuses','isActive','username','userrole','slugs','categories'))
        //     ->layout('components.layouts.app_backend', ['isActive' => $isActive,'categories' => $categories,'username' => $username, 'userrole' => $userrole]);


        return view('masterdata.categorymaster', compact('statuses','isActive','username','userrole','slugs','categories'));
    }



    
    public function seacrhData(Request $request){
        if ($request) {
            // Filter users based on search term
            // $this->categories = CategoryMaster::where('name', 'like', '%' . $this->search . '%')->get();
            $this->categories = CategoryMaster::where(function ($query) {
                $query->where('name', 'like', '%' .$request . '%')
                      ->orWhere('status_id', 'like', '%' .$request . '%');
                    })->get();
            
        } else {
            // Reset to all users if search is empty
            $this->categories = CategoryMaster::all();
        }
    }


    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'status'   => 'required',
        ]);
    
        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        // Upload image
        $imagePath = $request->image->storeAs('public/categories', $request->image->hashName());
    
        if($imagePath){
            //create category
            $categorymaster = CategoryMaster::create([
                'image'     => $imagePath, 
                'name'     => $request->name, 
                'status_id'   => $request->status
            ]);
        }
    
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Successfully Saved!',
            'data'    => $categorymaster  
        ]);
    }
    

    public function show(Post $post)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $post  
        ]); 
    }

    public function update(Request $request, Post $post)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'content'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $post->update([
            'title'     => $request->title, 
            'content'   => $request->content
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => $post  
        ]);
    }


    public function destroy($id)
    {
        //delete post by ID
        Post::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Post Berhasil Dihapus!.',
        ]); 
    }

}
