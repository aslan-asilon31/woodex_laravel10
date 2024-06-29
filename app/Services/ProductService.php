<?php

// app/Services/UserService.php


namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Datatables;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Rap2hpoutre\FastExcel\FastExcel;

class ProductService
{
    protected $productRepository;

    public function __construct(productRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
        // return UserResource::collection(User::paginate());
        return $this->productRepository->getAllProducts();
    }

    public function getProductById($userId)
    {
        return $this->productRepository->getProductById($userId);
    }

    public function getProductDetails(Request $request)
    {

      // dd($request->user_id);
      $product = Product::all();

        if (!$product) {
        abort(404); 
        }

        return $user;
    }

}
