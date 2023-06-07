<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\support\Facades\Validator;

class TestimoniController extends Controller
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
        return view('testimoni.index');
    }

    public function list2(){
        $testimonis = Testimoni::all();
        return view('testimoni.index2', compact('testimonis'));
    }

    public function update2(Request $request, $id){
        $testimonis = Testimoni::findOrfail($id);

        if($request->has('gambar')) {
            $image = $request->file('gambar');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('uploads/'), $filename);
            $testimonis->gambar = $request->file('gambar')->getClientOriginalName();
            $testimonis->update();
        } else {
            $testimonis->update($request->all());
        }

        return redirect()->route('testimoni');
    }

    public function index()
    {
        $testimonis = Testimoni::all();


        return response()->json([
           'data' => $testimonis
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
            'nama_testimoni' => 'required' ,
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

        $Testimoni = Testimoni::create($input);

        return response() ->json([
            'success' => true,
            'data' => $Testimoni
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimoni $Testimoni)
    {
        return response() ->json([
            'success' => true,
            'data' => $Testimoni
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimoni $Testimoni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimoni $Testimoni)
    {
        $validator = Validator::make($request->all(), [
            'nama_testimoni' => 'required' ,
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
            File::delete('uploads/' . $Testimoni->gambar);

            $gambar = $request->file('gambar');
            $nama_gambar = time() . rand(1,9) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('uploads', $nama_gambar);
            $input['gambar'] = $nama_gambar;
        }else {
            unset($input['gambar']);
        }

        $Testimoni -> update($input);

        return response() -> json([
            'success' => true,
            'message' => 'succes',
            'data' => $Testimoni
        
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimoni $Testimoni)
    {
        File::delete('uploads/' .  $Testimoni->gambar);
        $Testimoni -> delete();

        return response() -> json([
            
            'message' => 'succes'
        ]);
    }
}
