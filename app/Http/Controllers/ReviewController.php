<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\support\Facades\Validator;

class ReviewController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth')->only(['list']);
       $this->middleware('auth:api')->only(['store', 'update', 'delete']);
    }
    /**
     * Display a listing of the resource.
     */

     public function list()
    {
        return view('review.index');
    }

    public function index()
    {
        $reviews = Review::all();


        return response()->json([
           'data' => $reviews
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
            'id_member' => 'required' ,
            'id_produk' => 'required' ,
            'review' => 'required' ,
            'rating' => 'required' ,
        ]);

        if ($validator->fails()) {
            return response() ->json(
                $validator->errors(), 
                 422
            );
        }

        $input = $request->all();
        $Review = Review::create($input);

        return response() ->json([
            'success' => true,
            'data' => $Review
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $Review)
    {
        return response() ->json([
            'success' => true,
            'data' => $Review
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $Review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $Review)
    {
        $validator = Validator::make($request->all(), [
            'id_member' => 'required' ,
            'id_produk' => 'required' ,
            'review' => 'required' ,
            'rating' => 'required' ,
        ]);

        if ($validator->fails()) {
            return response() ->json(
                $validator->errors(), 
                 422
            );
        }

        $input = $request->all();

        $Review -> update($input);

        return response() -> json([
            'success' => true,
            'message' => 'succes',
            'data' => $Review
        
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $Review)
    {
        $Review -> delete();

        return response() -> json([
            'success' => true,
            'message' => 'succes'
        ]);
    }
}
