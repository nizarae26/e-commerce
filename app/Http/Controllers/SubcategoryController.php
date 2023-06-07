<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\support\Facades\Validator;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['list2','update2']);
        $this->middleware('auth:api')->only(['store', 'update', 'delete']);
    }
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        
        $subcategories = Subcategory::with('category')->get();
        
        // dd($subcategories);
        
        
        return response()->json([
            'data' => $subcategories
        ]);
    }
    
    public function list()
    {

        $categories = Category::all();

        return view('subkategori.index', compact('categories'));
    }

    public function list2(){
        $subcategories = Subcategory::all();
        $categories = Category::all();
        return view('subkategori.index2', compact('categories', 'subcategories'));
    }

    public function update2(Request $request, $id){
        $subcategories = Subcategory::findOrfail($id);

        if($request->has('gambar')) {
            $image = $request->file('gambar');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('uploads/'), $filename);
            $subcategories->gambar = $request->file('gambar')->getClientOriginalName();
            $subcategories->update();
        } else {
            $subcategories->update($request->all());
        }

        return redirect()->route('subcategory');
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
            'id_kategori' => 'required' ,
            'nama_subkategori' => 'required' ,
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

        $subcategory = Subcategory::create($input);

        return response() ->json([
            'success' => true,
            'message' => 'succes',
            'data' => $subcategory
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        return response() ->json([
            'success' => true,
            'data' => $subcategory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $validator = Validator::make($request->all(), [
            'id_kategori' => 'required' ,
            'nama_subkategori' => 'required' ,
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
            File::delete('uploads/' . $subcategory->gambar);

            $gambar = $request->file('gambar');
            $nama_gambar = time() . rand(1,9) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('uploads', $nama_gambar);
            $input['gambar'] = $nama_gambar;
        }else {
            unset($input['gambar']);
        }

        $subcategory -> update($input);

        return response() -> json([
            'success' => true,
            'message' => 'succes',
            'data' => $subcategory
        
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        File::delete('uploads/' .  $subcategory->gambar);
        $subcategory -> delete();

        return response() -> json([
            'message' => 'success'
        ]);
    }
}
