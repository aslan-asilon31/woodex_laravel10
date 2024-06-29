<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\MasterData\CategoryMaster;
use Datatables;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Rap2hpoutre\FastExcel\FastExcel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index');
    }

    public function getdata(){


        if(request()->ajax()) {

            $query = "SELECT a.product_id as product_id,a.name,a.image as image,a.dimension,a.created_at
                        FROM products a
                    ";

            $products = DB::connection('mysql')->select($query);

            return datatables()->of($products)
            ->addColumn('action', function ($product) {
                return view('products.action', ['product' => $product]);
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);

        }

    }


    /**
     * Show the form for creating a new resource.
     */
    public function search_detail()
    {
        $category_masters = CategoryMaster::all();
        // dd($category_masters);
        return view('product_search_detail', compact('category_masters'));
    }


    public function search_by_category(Request $request)
    {
        $category_id = $request->category_id;
    
        $query = "
            SELECT a.product_id, a.name, a.image, a.dimension, a.created_at, b.price_before, b.price_after
            FROM products a
            LEFT JOIN price_masters b ON a.price_master_id = b.price_master_id
            WHERE a.category_master_id = :category_id
        ";
    
        $products = DB::connection('mysql')->select($query, ['category_id' => $category_id]);
        return response()->json($products);
    }
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
