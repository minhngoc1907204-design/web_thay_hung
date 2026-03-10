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
        // cho phép API chạy không cần login
        $this->middleware("auth")->except([
            'apiIndex',
            'apiShow',
            'apiStore',
            'apiUpdate',
            'apiDestroy'
        ]);

        view()->share("products", Product::all());
        view()->share("comments", Comment::all());
        view()->share("ratings", Rating::all());
    }

    // ================= WEB ADMIN =================

    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->status !== null && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $products = $query->get();

        return view("admin.products_management.product-list", compact("products"));
    }

    public function create()
    {
        $categories = Category::all();
        return view("admin.products_management.add", compact("categories"));
    }

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

        if ($product) {
            return redirect()->route('admin.products_management.index');
        }

        return back();
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.products_management.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('admin.products_management.edit', compact('categories', 'product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        if ($product) {
            return redirect()->route("admin.products_management.index");
        }

        return back();
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        if ($product) {
            return redirect()->route("admin.products_management.index");
        }

        return back();
    }

    // ================= API =================

    // lấy tất cả sản phẩm
    public function apiIndex()
    {
        $products = Product::with('category')->get();

        return response()->json([
            "status" => "success",
            "data" => $products
        ]);
    }

    // lấy chi tiết sản phẩm
    public function apiShow($id)
    {
        $product = Product::with('category')->find($id);

        if (!$product) {
            return response()->json([
                "status" => "error",
                "message" => "Product not found"
            ]);
        }

        return response()->json([
            "status" => "success",
            "data" => $product
        ]);
    }

    // thêm sản phẩm
    public function apiStore(Request $request)
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

    // cập nhật sản phẩm
    public function apiUpdate(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                "status" => "error",
                "message" => "Product not found"
            ]);
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

    // xoá sản phẩm
    public function apiDestroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                "status" => "error",
                "message" => "Product not found"
            ]);
        }

        $product->delete();

        return response()->json([
            "status" => "success",
            "message" => "Product deleted"
        ]);
    }
}