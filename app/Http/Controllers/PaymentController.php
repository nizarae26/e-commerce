<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\support\Facades\Validator;

class PaymentController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth')->only(['list']);
       $this->middleware('auth:api')->only(['store', 'update', 'delete']);
    }

    public function list()
    {
        return view('payment.index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Payment::all();


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

        $Payment = Payment::create($input);

        return response() ->json([
            'success' => true,
            'message' => 'succes',
            'data' => $Payment
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $Payment)
    {
        return response() -> json([
            'data' => $Payment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $Payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $Payment)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required' ,
        ]);

        if ($validator->fails()) {
            return response() ->json(
                $validator->errors(), 
                 422
            );
        }

        $input = $request->all();
        
        $Payment -> update([
            'status' => request('status')
        ]);

        return response() -> json([
            'success' => true,
            'message' => 'succes',
            'data' => $Payment
        
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $Payment)
    {

        File::delete('uploads/' .  $Payment->gambar);
        $Payment -> delete();

        return response() -> json([
            'success' => true,
            'message' => 'succes',
        ]);
    }
}
