<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['list']);
        $this->middleware('auth:api')->only(['store', 'update', 'delete']);
        // $this->middleware('auth')->only(['index']);
        // $this->middleware('auth:api')->only(['get_reports']);
    }
    
    public function get_reports(Request $request)
    {
        $report = DB::table('order_details')
            ->join('products', 'products.id', '=', 'order_details.id_produk')
            ->select(DB::raw('
                nama_barang, 
                count(*) as jumlah_dibeli,
                harga,
                total, 
                SUM(jumlah) as total_qty'))
            ->whereRaw("date(order_details.created_at) >= '$request->dari'")    
            ->whereRaw("date(order_details.created_at) <= '$request->sampai'")    
            ->groupBy('id_produk', 'nama_barang', 'harga')
            ->get(); 

            return response() ->json([
                'data' => $report
            ]);
    }

    // public function index(Request $request)
    // {
    //     return view('report.index');
    // }

    public function list()
    {
        return view('report.index');
    }

    public function index()
    {
        $order_details = OrderDetail::all();


        return response()->json([
           'data' => $order_details
        ]);
    }

    public function show(OrderDetail $order_details)
    {
        return response() -> json([
            'data' => $order_details
        ]);
    }

}
