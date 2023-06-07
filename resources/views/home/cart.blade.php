@extends('layout.home')

@section ('title', 'Cart')

@section('content')

<!-- Cart -->
<section class="section-wrap shopping-cart">
        <div class="container relative">
          <form class="form-cart">
            <input type="hidden" name="id_member" value="11">

          
          <div class="row">

            <div class="col-md-12">
              <div class="table-wrap mb-30">
                <table class="shop_table cart table">
                  <thead>
                    <tr>
                      <th class="product-name" colspan="2">Product</th>
                      <th class="product-price">Price</th>
                      <th class="product-quantity">Quantity</th>
                      <th class="product-subtotal" colspan="2">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($carts as $cart)
                    <input type="hidden" name="id_produk[]" value="{{$cart->product->id}}">
                    <input type="hidden" name="jumlah[]" value="{{$cart->jumlah}}">
                    <input type="hidden" name="size[]" value="{{$cart->size}}">
                    <input type="hidden" name="color[]" value="{{$cart->color}}">
                    <input type="hidden" name="total[]" value="{{$cart->total}}">
                    <tr class="cart_item">
                      <td class="product-thumbnail">
                        <a href="#">
                          <img src="/uploads/{{$cart->product->gambar}}" alt="">
                        </a>
                      </td>
                      <td class="product-name">
                        <a href="#">{{$cart->product->nama_barang}}</a>
                        <ul>
                          <li>Size: {{$cart->size}}</li>
                          <li>Color: {{$cart->color}}</li>
                        </ul>
                      </td>
                      <td class="product-price">
                        <span class="amount">{{ "Rp." . number_format($cart->product->harga)}}</span>
                      </td>
                      <td class="product-quantity">
                        <span class="amount">{{$cart->jumlah}}</span>
                      </td>
                      <td class="product-subtotal">
                        <span class="amount">{{ "Rp." . number_format($cart->total)}}</span>
                      </td>
                      <td class="product-remove">
                        <a href="/delete_from_cart/{{$cart->id}}" class="remove" title="Remove this item">
                          <i class="ui-close"></i>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              <div class="row mb-50">
                <div class="col-md-5 col-sm-12">
                 
                </div>

                <div class="col-md-7">
                  <div class="actions">
                    <div class="wc-proceed-to-checkout">
                      <a href="#"  class="btn btn-lg btn-dark checkout"><span>proceed to checkout</span></a>
                    </div>
                  </div>
                </div>
              </div>

            </div> <!-- end col -->
          </div> <!-- end row -->

          <div class="row">
            <div class="col-md-6 shipping-calculator-form">
              <h2 class="heading relative uppercase bottom-line full-grey mb-30">Address</h2>
              <!-- <p class="form-row form-row-wide">
                <select name="provinsi" id="provinsi" class="country_to_state provinsi" rel="calc_shipping_state">
                  @foreach ($provinsi->rajaongkir->results as $provinsi)
                  <option value="{{$provinsi->province_id}}">{{$provinsi->province}}</option>
                  @endforeach
                </select>
              </p>

              <p class="form-row form-row-wide">
                <select name="kota" id="kota" class="country_to_state kota" rel="calc_shipping_state">
                  
                  
                </select>
              </p> -->

              <div class="row row-10">
                <div class="col-sm-12">
                  <p class="form-row form-row-wide">
                    <input type="text" class="input-text"  placeholder="Detail Alamat" name="detail_alamat" id="Detail Alamat">
                  </p>
                </div>
              </div>

              <p>
                <input type="submit" name="calc_shipping" value="Update Totals" class="btn btn-lg btn-stroke mt-10 mb-mdm-40">
              </p>                
            </div> <!-- end col shipping calculator -->

            <div class="col-md-6">
              <div class="cart_totals">
                <h2 class="heading relative bottom-line full-grey uppercase mb-30">Cart Totals</h2>

                <table class="table shop_table">
                  <tbody>
                    <tr class="shipping">
                      <th>Shipping</th>
                      <td>
                        <span>Free Shipping</span>
                      </td>
                    </tr>
                    <tr class="cart-subtotal">
                      <th>Order Total</th>
                      <td>
                        <input type="hidden" name="grand_total" class="grand_total">
                        <strong><span class="amount cart-total">{{ "Rp." . number_format($cart_total)}}</span></strong>
                      </td>
                    </tr>
                    <!-- <tr class="order-total">
                      <th>Order Total</th>
                      <td>
                        <strong><span class="amount">0</span></strong>
                      </td>
                    </tr> -->
                  </tbody>
                </table>

              </div>
            </div> <!-- end col cart totals -->

          </div> <!-- end row -->     

          </form>
        </div> <!-- end container -->
      </section> <!-- end cart -->


@endsection

@push('js')
    
      $(function(){
            $('.provinsi').change(function(){

                $.ajax({
                  url : '/get_kota/' + $(this).val(),
                  success : function (data){
                      console.log(data)
                  }
                })
            })

        $('.checkout').click(function(){
          $.ajax({
                  url : '/checkout_orders',
                  method : "POST",
                  data : $('.form-cart').serialize(),
                  headers : {
                    'X-CSRF-TOKEN' : "{{csrf_token()}}",                  
                  },
                  success : function(data){
                    console.log(data)
                    window.location.href = '/checkout'
                  }
            })
        });    
      });
   
@endpush