<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['list2','update2']);
        $this->middleware('auth:api')->only(['store', 'update', 'delete']);
    }
    /**
     * Display a listing of the resource.
     */

     public function list()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('product.index', compact('categories', 'subcategories'));
    }

    public function list2(){
        $products = Product::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('product.index2', compact('categories', 'subcategories', 'products'));
    }

    public function update2(Request $request, $id){
        $products = Product::findOrfail($id);

        if($request->has('gambar')) {
            $image = $request->file('gambar');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('uploads/'), $filename);
            $products->gambar = $request->file('gambar')->getClientOriginalName();
            $products->update();
        } else {
            $products->update($request->all());
        }

        return redirect()->route('products');
    }

    public function index()
    {
        $products = Product::with('category', 'subcategory')->get();


        return response()->json([
           'data' => $products
        ]);
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
        $validator = Validator::make($request->all(), [
            'id_kategori' => 'required',
            'id_subkategori' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
            'diskon' => 'required',
            'bahan' => 'required',
            'tags' => 'required',
            'sku' => 'required',
            'ukuran' => 'required',
            'warna' => 'required' ,
            'gambar' => 'required',
            'deskripsi' => 'required' ,
            'gambar' => 'required|image|mimes:jpg,png,jpeg,webp'
        ]);

        if ($validator->fails()) {
            return response() ->json(
                $validator->errors(), 
                 422
            );
        }

        $input = $request->all();

        if ($request->has('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . rand(1,9) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('uploads', $nama_gambar);
            $input['gambar'] = $nama_gambar;
        }

        $products = Product::create($input);

        return response() ->json([
            'success' => true,
            'data' => $products
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $Product)
    {
        return response() ->json([
            'success' => true,
            'data' => $Product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $Product)
    {
        $validator = Validator::make($request->all(), [
            'id_kategori' => 'required',
            'id_subkategori' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
            'diskon' => 'required',
            'bahan' => 'required',
            'tags' => 'required',
            'sku' => 'required',
            'ukuran' => 'required',
            'warna' => 'required' ,
            'gambar' => 'required',
            'deskripsi' => 'required' ,
            'gambar' => 'required|image|mimes:jpg,png,jpeg,webp'
        ]);

        if ($validator->fails()) {
            return response() ->json(
                $validator->errors(), 
                 422
            );
        }

        $input = $request->all();
        

        if ($request->has('gambar')) {
            File::delete('uploads/' . $Product->gambar);

            $gambar = $request->file('gambar');
            $nama_gambar = time() . rand(1,9) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('uploads', $nama_gambar);
            $input['gambar'] = $nama_gambar;
        }else {
            unset($input['gambar']);
        }

        $Product -> update($input);

        return response() -> json([
            'success' => true,
            'message' => 'succes',
            'data' => $Product
        
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $Product)
    {
        File::delete('uploads/' .  $Product->gambar);
        $Product -> delete();

        return response() -> json([
            'success' => true,
            'message' => 'success'
        ]);
    }
}
