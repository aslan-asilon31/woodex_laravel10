<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\MasterData\CategoryMaster;

use App\Services\ProductService;


class CatalogProductController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $productcategories = CategoryMaster::all();
        $products = $this->productService->getAllProducts();
        return view('catalog.products.index', compact('products','productcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function searchproduct(Request $request)
    {
        $products = Product::query()
            ->when($request->filled('SearchName'), function ($query) use ($request) {
                $searchName = $request->input('SearchName');
                $query->whereRaw("LOWER(name) LIKE ?", ["%".strtolower($searchName)."%"]);
            })
            ->when($request->filled('SearchCategoryId') && $request->input('SearchCategoryId') != 0, function ($query) use ($request) {
                $query->where('category_master_id', $request->input('SearchCategoryId'));
            })
            ->get();
    
        return view('catalog.products.index', compact('products'));
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
