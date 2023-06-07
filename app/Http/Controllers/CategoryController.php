<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\support\Facades\Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth')->only(['list2','update2']);
       $this->middleware('auth:api')->only(['store', 'update', 'delete']);
    }

    public function list()
    {
        $categories = Category::all();
        return view('kategori.index', compact('categories'));
    }

    public function list2(){
        $categories = Category::all();
        return view('kategori.index2', compact('categories'));
    }

    public function update2(Request $request, $id){
        $categories = Category::findOrfail($id);

        if($request->has('gambar')) {
            $image = $request->file('gambar');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('uploads/'), $filename);
            $categories->gambar = $request->file('gambar')->getClientOriginalName();
            $categories->update();
        } else {
            $categories->update($request->all());
        }

        return redirect()->route('category');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();


        return response()->json([
           'data' => $categories
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
            'nama_kategori' => 'required' ,
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

        $category = category::create($input);

        return response() ->json([
            'success' => true,
            'message' => 'succes',
            'data' => $category
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response() -> json([
            'data' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required' ,
            'deskripsi' => 'required' ,
        ]);

        if ($validator->fails()) {
            return response() ->json(
                $validator->errors(), 
                 422
            );
        }

        $input = $request->all();
        

        if ($request->has('gambar')) {
            File::delete('uploads/' . $category->gambar);

            $gambar = $request->file('gambar');
            $nama_gambar = time() . rand(1,9) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('uploads', $nama_gambar);
            $input['gambar'] = $nama_gambar;
        }else {
            unset($input['gambar']);
        }

        $category -> update($input);

        return response() -> json([
            'success' => true,
            'message' => 'succes',
            'data' => $category
        
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        File::delete('uploads/' .  $category->gambar);
        $category -> delete();

        return response() -> json([
            'success' => true,
            'message' => 'succes',
        ]);
    }
}
