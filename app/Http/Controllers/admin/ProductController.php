<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Rating;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        view()->share("products", Product::all());
        view()->share("comments", Comment::all());
        view()->share("ratings", Rating::all());
    }

    // ================= API =================

    // GET /api/products
    public function index()
    {
        $products = Product::with('category')->get();

        return response()->json([
            "status" => "success",
            "data" => $products
        ]);
    }

    // GET /api/products/{id}
    public function show($id)
    {
        $product = Product::with('category')->find($id);

        if (!$product) {
            return response()->json([
                "status" => "error",
                "message" => "Product not found"
            ], 404);
        }

        return response()->json([
            "status" => "success",
            "data" => $product
        ]);
    }

    // POST /api/products
    public function store(Request $request)
    {
        $product = Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image,
            'description' => $request->description,
            'status' => $request->status ?? 1,
        ]);

        return response()->json([
            "status" => "success",
            "data" => $product
        ]);
    }

    // PUT /api/products/{id}
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                "status" => "error",
                "message" => "Product not found"
            ], 404);
        }

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return response()->json([
            "status" => "success",
            "data" => $product
        ]);
    }

    // DELETE /api/products/{id}
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                "status" => "error",
                "message" => "Product not found"
            ], 404);
        }

        $product->delete();

        return response()->json([
            "status" => "success",
            "message" => "Product deleted"
        ]);
    }

}