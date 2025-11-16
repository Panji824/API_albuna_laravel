<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest; 

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return response()->json($products);
    }


    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());
        return response()->json($product, 201);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }


    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return response()->json($product);
    }

  
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204); 
    }
    
    public function newArrivals()
    {
        $new_products = Product::where('is_new_arrival', TRUE)
                                ->orderBy('created_at', 'desc')
                                ->take(2)
                                ->get();
        

        if ($new_products->isEmpty()) {
            $new_products = Product::orderBy('created_at', 'desc')->take(2)->get();
        }

        return response()->json($new_products);
    }
}