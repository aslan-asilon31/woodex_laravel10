<?php

// app/Repositories/UserRepository.php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProductById($userId)
    {
        return Product::find($userId);
    }

}
