<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Member;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
   public function index()
   {

      $sliders = Slider::all();
      $categories = Category::all();
      $testimonies = Testimoni::all();
      $products = Product::skip(0)->take(8)->get();
      return view('home.index', compact('sliders', 'categories', 'testimonies', 'products'));
   }

   public function products($id_subcategory)
   {
      $products = Product::where('id_subkategori', $id_subcategory)->get();
      return view('home.products', compact('products'));
   }

   public function add_to_cart(Request $request)
   {
      $members = Member::all();
      $input = $request->all();
      Cart::create($input);
   }
   
   public function delete_from_cart(Cart $cart)
   {
      $members = Member::all();
      
      $cart->delete();
      return redirect('/cart');
   }


   
   public function product($id_product)
   {
      $product = Product::find($id_product);
      $latest_products = Product::orderByDesc('created_at')->offset(0)->limit(10)->get();
      return view('home.product', compact('product', 'latest_products'));
   }

   public function cart()
   {
      $curl = curl_init();

         curl_setopt_array($curl, array(
         CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => "",
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "GET",
         CURLOPT_HTTPHEADER => array(
            "key: 049c49fe606a3b8ebf00af06792ed23a"
         ),
         ));

         $response = curl_exec($curl);
         $err = curl_error($curl);

         curl_close($curl);

         if ($err) {
         echo "cURL Error #:" . $err;
         } 

      $provinsi = json_decode($response);   

      $carts = Cart::all();
      $cart_total = Cart::all()->sum('total');
      return view('home.cart', compact('carts', 'provinsi', 'cart_total'));
   }

   public function get_kota($id)
   {

      
      
      $curl = curl_init();

         curl_setopt_array($curl, array(
         CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $id,
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => "",
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "GET",
         CURLOPT_HTTPHEADER => array(
            "key: 049c49fe606a3b8ebf00af06792ed23a"
         ),
         ));

         $response = curl_exec($curl);
         $err = curl_error($curl);

         curl_close($curl);

         if ($err) {
         echo "cURL Error #:" . $err;
         } else {
         echo $response;
         }
   }
   public function checkout_orders(Request $request)
   {
      $id = DB::table('orders')->insertGetId([
         'id_member' => $request->id_member,
         'invoice' => date('ymdhs'),
         'grand_total' => $request->grand_total,
         'status' => 'Baru',
      ]);

      for ($i=0; $i < count($request->id_produk); $i++) { 
         DB::table('order_details')->insert([
            'id_order' => $id,
            'id_produk' => $request->id_produk[$i],
            'jumlah' => $request->jumlah[$i],
            'size' => $request->size[$i],
            'color' => $request->color[$i],
            'total' => $request->total[$i],
         ]);
      }

      Cart::where('id_member', Auth::guard()->user()->id)->update([
         
         'is_checkout' => 1

      ]);

      // return view('home.checkout');

   }

   public function checkout()
   {
    return view('home.checkout');
   }

   public function orders()
   {
    return view('home.orders');
   }

   public function about()
   {
      $about = About::first();
      $testimonies = Testimoni::all();
      return view('home.about', compact('about', 'testimonies'));
   }
   
   public function contact()
   {
      $about = About::first();
    return view('home.contact', compact('about'));
   }

   public function faq()
   {
    return view('home.faq');
   }
}
