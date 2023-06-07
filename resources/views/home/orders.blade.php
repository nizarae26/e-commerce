@extends('layout.home')

@section('content')

     <!-- Hero Slider -->
     <section class="hero-wrap text-center relative">
      <div id="owl-hero" class="owl-carousel owl-theme light-arrows slider-animated">
        <div class="hero-slide overlay" style="background-image:url(/frontend/img/hero/1.jpg)">
          <div class="container">
            <div class="hero-holder">
              <div class="hero-message">
                <h1 class="hero-title nocaps">Great Fashion 2017</h1>
                <h2 class="hero-subtitle lines">New Arrivals Collection</h2>
                <div class="buttons-holder">
                  <a href="#" class="btn btn-lg btn-transparent"><span>Shop Now</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="hero-slide overlay" style="background-image:url(/frontend/img/hero/2.jpg)">
          <div class="container">
            <div class="hero-holder">
              <div class="hero-message">
                <h1 class="hero-title nocaps">Exclusive Products</h1>
                <h2 class="hero-subtitle lines">Get awesome items only in Zenna online shop</h2>
                <div class="buttons-holder">
                  <a href="#" class="btn btn-lg btn-color"><span>Buy it Now</span></a>
                  <a href="#" class="btn btn-lg btn-transparent"><span>Learn More</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="hero-slide overlay" style="background-image:url(/frontend/img/hero/3.jpg)">
          <div class="container">
            <div class="hero-holder">
              <div class="hero-message">
                <h1 class="hero-title nocaps">Enjoy Online Shopping</h1>
                <h2 class="hero-subtitle lines">Zenna is perfectly responsive theme</h2>
                <div class="buttons-holder">
                  <a href="#" class="btn btn-lg btn-transparent"><span>Shop Now</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> <!-- end hero slider -->

      <!-- Promo Banners -->
      <section class="section-wrap promo-banners pb-50">
        <div class="container">
          <div class="row">

            <div class="col-xs-4 col-xxs-12 mb-30 promo-banner style-2">
              <a href="/frontend/#">
                <img src="/frontend/img/shop/collection_4.jpg" alt="">
                <div class="promo-inner">
                  <h2>men</h2>
                </div>
              </a>                        
            </div>

            <div class="col-xs-4 col-xxs-12 mb-30 promo-banner style-2">
              <a href="/frontend/#">
                <img src="/frontend/img/shop/collection_5.jpg" alt="">
                <div class="promo-inner">
                  <h2>accessories</h2>
                </div>
              </a>                        
            </div>

            <div class="col-xs-4 col-xxs-12 mb-30 promo-banner style-2">
              <a href="/frontend/#">
                <img src="/frontend/img/shop/collection_6.jpg" alt="">
                <div class="promo-inner">
                  <h2>footwear</h2>
                </div>
              </a>                        
            </div>
            
          </div>
        </div>
      </section> <!-- end promo banners -->


      <!-- Tabs/Slider Products -->
      <section class="section-wrap pt-0">
        <div class="container-fluid">

          <!-- Tabs -->
          <div class="text-center">
            <div class="tabs product-tabs">
            
              <ul class="nav nav-tabs">                                
                <li class="active">
                  <a href="/frontend/#featured" data-toggle="tab">Featured</a>
                </li>                                
                <li>
                  <a href="/frontend/#new-items" data-toggle="tab">New Items</a>
                </li>                                
                <li>
                  <a href="/frontend/#top-rated" data-toggle="tab">Top Rated</a>
                </li>                                
              </ul>
            
            </div>
          </div>


        <!-- Tab Content -->
        <div class="tab-content tabs-slider-content">

          <!-- Featured -->
          <div class="tab-pane fade in active" id="featured">

            <div id="owl-shop-items-slider-1" class="owl-carousel owl-theme">

              <div class="product">
                <div class="product-item hover-trigger">
                  <div class="product-img">
                    <a href="/frontend/shop-single.html">
                      <img src="/frontend/img/shop/shop_item_1.jpg" alt="">
                      <img src="/frontend/img/shop/shop_item_back_1.jpg" alt="" class="back-img">
                    </a>
                    <div class="product-label">
                      <span class="sale">sale</span>
                    </div>
                    <div class="hover-2">                    
                      <div class="product-actions">
                        <a href="/frontend/#" class="product-add-to-wishlist">
                          <i class="fa fa-heart"></i>
                        </a>
                      </div>                        
                    </div>
                    <a href="/frontend/#" class="product-quickview">Quick View</a>
                  </div>
                  <div class="product-details">                      
                    <h3 class="product-title">
                      <a href="/frontend/shop-single.html">Drawstring Dress</a>
                    </h3>
                    <span class="category">
                      <a href="/frontend/catalogue-grid.html">Women</a>
                    </span>
                  </div>
                  <span class="price">
                    <del>
                      <span>$730.00</span>
                    </del>
                    <ins>
                      <span class="amount">$399.99</span>
                    </ins>
                  </span>
                </div>
              </div>

              <div class="product">
                <div class="product-item hover-trigger">
                  <div class="product-img">
                    <a href="/frontend/shop-single.html">
                      <img src="/frontend/img/shop/shop_item_9.jpg" alt="">
                      <img src="/frontend/img/shop/shop_item_back_9.jpg" alt="" class="back-img">
                    </a>
                    <div class="hover-2">                    
                      <div class="product-actions">
                        <a href="/frontend/#" class="product-add-to-wishlist">
                          <i class="fa fa-heart"></i>
                        </a>
                      </div>                        
                    </div>
                    <a href="/frontend/#" class="product-quickview">Quick View</a>
                  </div>
                  <div class="product-details">                      
                    <h3 class="product-title">
                      <a href="/frontend/shop-single.html">Camo Belt</a>
                    </h3>
                    <span class="category">
                      <a href="/frontend/catalogue-grid.html">Accessories</a>
                    </span>
                  </div>
                  <span class="price">
                    <ins>
                      <span class="amount">$33.00</span>
                    </ins>
                  </span>
                </div>
              </div>

              <div class="product">
                <div class="product-item hover-trigger">
                  <div class="product-img">
                    <a href="/frontend/shop-single.html">
                      <img src="/frontend/img/shop/shop_item_12.jpg" alt="">
                      <img src="/frontend/img/shop/shop_item_back_12.jpg" alt="" class="back-img">
                    </a>
                    <div class="hover-2">                    
                      <div class="product-actions">
                        <a href="/frontend/#" class="product-add-to-wishlist">
                          <i class="fa fa-heart"></i>
                        </a>
                      </div>                        
                    </div>
                    <a href="/frontend/#" class="product-quickview">Quick View</a>
                  </div>
                  <div class="product-details">                      
                    <h3 class="product-title">
                      <a href="/frontend/shop-single.html">Sport T-shirt</a>
                    </h3>
                    <span class="category">
                      <a href="/frontend/catalogue-grid.html">Men</a>
                    </span>
                  </div>
                  <span class="price">
                    <ins>
                      <span class="amount">$230.00</span>
                    </ins>
                  </span>
                </div>
              </div>

              <div class="product">
                <div class="product-item hover-trigger">
                  <div class="product-img">
                    <a href="/frontend/shop-single.html">
                      <img src="/frontend/img/shop/shop_item_4.jpg" alt="">
                      <img src="/frontend/img/shop/shop_item_back_4.jpg" alt="" class="back-img">
                    </a>
                    <div class="hover-2">                    
                      <div class="product-actions">
                        <a href="/frontend/#" class="product-add-to-wishlist">
                          <i class="fa fa-heart"></i>
                        </a>
                      </div>                        
                    </div>
                    <a href="/frontend/#" class="product-quickview">Quick View</a>
                  </div>
                  <div class="product-details">                      
                    <h3 class="product-title">
                      <a href="/frontend/shop-single.html">Sweater w/ Colar</a>
                    </h3>
                    <span class="category">
                      <a href="/frontend/catalogue-grid.html">Men</a>
                    </span>
                  </div>
                  <span class="price">
                    <ins>
                      <span class="amount">$299.00</span>
                    </ins>
                  </span>
                </div>
              </div>

              <div class="product">
                <div class="product-item hover-trigger">
                  <div class="product-img">
                    <a href="/frontend/shop-single.html">
                      <img src="/frontend/img/shop/shop_item_2.jpg" alt="">
                      <img src="/frontend/img/shop/shop_item_back_2.jpg" alt="" class="back-img">
                    </a>
                    <div class="hover-2">                    
                      <div class="product-actions">
                        <a href="/frontend/#" class="product-add-to-wishlist">
                          <i class="fa fa-heart"></i>
                        </a>
                      </div>                        
                    </div>
                    <a href="/frontend/#" class="product-quickview">Quick View</a>
                  </div>
                  <div class="product-details">                      
                    <h3 class="product-title">
                      <a href="/frontend/shop-single.html">Mesh Brown Sandal</a>
                    </h3>
                    <span class="category">
                      <a href="/frontend/catalogue-grid.html">Accessories</a>
                    </span>
                  </div>
                  <span class="price">
                    <ins>
                      <span class="amount">$190.00</span>
                    </ins>
                  </span>
                </div>
              </div>

              <div class="product">
                <div class="product-item hover-trigger">
                  <div class="product-img">
                    <a href="/frontend/shop-single.html">
                      <img src="/frontend/img/shop/shop_item_6.jpg" alt="">
                      <img src="/frontend/img/shop/shop_item_back_6.jpg" alt="" class="back-img">
                    </a>
                    <div class="product-label">
                      <span class="sale">sale</span>
                    </div>
                    <div class="hover-2">                    
                      <div class="product-actions">
                        <a href="/frontend/#" class="product-add-to-wishlist">
                          <i class="fa fa-heart"></i>
                        </a>
                      </div>                        
                    </div>
                    <a href="/frontend/#" class="product-quickview">Quick View</a>
                  </div>
                  <div class="product-details">                      
                    <h3 class="product-title">
                      <a href="/frontend/shop-single.html">Faux Suits</a>
                    </h3>
                    <span class="category">
                      <a href="/frontend/catalogue-grid.html">Men</a>
                    </span>
                  </div>
                  <span class="price">
                    <del>
                      <span>$500.00</span>
                    </del>
                    <ins>
                      <span class="amount">$233.00</span>
                    </ins>
                  </span>
                </div>
              </div>

            </div> <!-- end slider -->

          </div> <!-- end featured -->

          <!-- New Items -->
          <div class="tab-pane fade in" id="new-items">

            <div id="owl-shop-items-slider-2" class="owl-carousel owl-theme">      

              <div class="product">
                <div class="product-item hover-trigger">
                  <div class="product-img">
                    <a href="/frontend/shop-single.html">
                      <img src="/frontend/img/shop/shop_item_7.jpg" alt="">
                      <img src="/frontend/img/shop/shop_item_back_7.jpg" alt="" class="back-img">
                    </a>
                    <div class="hover-2">                    
                      <div class="product-actions">
                        <a href="/frontend/#" class="product-add-to-wishlist">
                          <i class="fa fa-heart"></i>
                        </a>
                      </div>                        
                    </div>
                    <a href="/frontend/#" class="product-quickview">Quick View</a>
                  </div>
                  <div class="product-details">                      
                    <h3 class="product-title">
                      <a href="/frontend/shop-single.html">Crew Watch</a>
                    </h3>
                    <span class="category">
                      <a href="/frontend/catalogue-grid.html">Accessories</a>
                    </span>
                  </div>
                  <span class="price">
                    <ins>
                      <span class="amount">$280.00</span>
                    </ins>
                  </span>
                </div>
              </div>

              <div class="product">
                <div class="product-item hover-trigger">
                  <div class="product-img">
                    <a href="/frontend/shop-single.html">
                      <img src="/frontend/img/shop/shop_item_8.jpg" alt="">
                      <img src="/frontend/img/shop/shop_item_back_8.jpg" alt="" class="back-img">
                    </a>
                    <div class="hover-2">                    
                      <div class="product-actions">
                        <a href="/frontend/#" class="product-add-to-wishlist">
                          <i class="fa fa-heart"></i>
                        </a>
                      </div>                        
                    </div>
                    <a href="/frontend/#" class="product-quickview">Quick View</a>
                  </div>
                  <div class="product-details">                      
                    <h3 class="product-title">
                      <a href="/frontend/shop-single.html">Jersey Stylish</a>
                    </h3>
                    <span class="category">
                      <a href="/frontend/catalogue-grid.html">Women</a>
                    </span>
                  </div>
                  <span class="price">
                    <ins>
                      <span class="amount">$298.00</span>
                    </ins>
                  </span>
                </div>
              </div>

              <div class="product">
                <div class="product-item hover-trigger">
                  <div class="product-img">
                    <a href="/frontend/shop-single.html">
                      <img src="/frontend/img/shop/shop_item_3.jpg" alt="">
                      <img src="/frontend/img/shop/shop_item_back_3.jpg" alt="" class="back-img">
                    </a>
                    <div class="hover-2">                    
                      <div class="product-actions">
                        <a href="/frontend/#" class="product-add-to-wishlist">
                          <i class="fa fa-heart"></i>
                        </a>
                      </div>                        
                    </div>
                    <a href="/frontend/#" class="product-quickview">Quick View</a>
                  </div>
                  <div class="product-details">                      
                    <h3 class="product-title">
                      <a href="/frontend/shop-single.html">Tribal Grey Blazer</a>
                    </h3>
                    <span class="category">
                      <a href="/frontend/catalogue-grid.html">Women</a>
                    </span>
                  </div>
                  <span class="price">
                    <ins>
                      <span class="amount">$330.00</span>
                    </ins>
                  </span>
                </div>
              </div>

              <div class="product">
                <div class="product-item hover-trigger">
                  <div class="product-img">
                    <a href="/frontend/shop-single.html">
                      <img src="/frontend/img/shop/shop_item_10.jpg" alt="">
                      <img src="/frontend/img/shop/shop_item_back_10.jpg" alt="" class="back-img">
                    </a>
                    <div class="hover-2">                    
                      <div class="product-actions">
                        <a href="/frontend/#" class="product-add-to-wishlist">
                          <i class="fa fa-heart"></i>
                        </a>
                      </div>                        
                    </div>
                    <a href="/frontend/#" class="product-quickview">Quick View</a>
                  </div>
                  <div class="product-details">                      
                    <h3 class="product-title">
                      <a href="/frontend/shop-single.html">Heathered Scarf</a>
                    </h3>
                    <span class="category">
                      <a href="/frontend/catalogue-grid.html">Accessories</a>
                    </span>
                  </div>
                  <span class="price">
                    <ins>
                      <span class="amount">$180.00</span>
                    </ins>
                  </span>
                </div>
              </div>

              <div class="product">
                <div class="product-item hover-trigger">
                  <div class="product-img">
                    <a href="/frontend/shop-single.html">
                      <img src="/frontend/img/shop/shop_item_5.jpg" alt="">
                      <img src="/frontend/img/shop/shop_item_back_5.jpg" alt="" class="back-img">
                    </a>
                    <div class="hover-2">                    
                      <div class="product-actions">
                        <a href="/frontend/#" class="product-add-to-wishlist">
                          <i class="fa fa-heart"></i>
                        </a>
                      </div>                        
                    </div>
                    <a href="/frontend/#" class="product-quickview">Quick View</a>
                  </div>
                  <div class="product-details">                      
                    <h3 class="product-title">
                      <a href="/frontend/shop-single.html">Lola May Crop Blazer</a>
                    </h3>
                    <span class="category">
                      <a href="/frontend/catalogue-grid.html">Women</a>
                    </span>
                  </div>
                  <span class="price">
                    <ins>
                      <span class="amount">$42.00</span>
                    </ins>
                  </span>
                </div>
              </div>

              <div class="product">
                <div class="product-item hover-trigger">
                  <div class="product-img">
                    <a href="/frontend/shop-single.html">
                      <img src="/frontend/img/shop/shop_item_12.jpg" alt="">
                      <img src="/frontend/img/shop/shop_item_back_12.jpg" alt="" class="back-img">
                    </a>
                    <div class="product-label">
                      <span class="sale">sale</span>
                    </div>
                    <div class="hover-2">                    
                      <div class="product-actions">
                        <a href="/frontend/#" class="product-add-to-wishlist">
                          <i class="fa fa-heart"></i>
                        </a>
                      </div>                        
                    </div>
                    <a href="/frontend/#" class="product-quickview">Quick View</a>
                  </div>
                  <div class="product-details">                      
                    <h3 class="product-title">
                      <a href="/frontend/shop-single.html">Sport T-shirt</a>
                    </h3>
                    <span class="category">
                      <a href="/frontend/catalogue-grid.html">Men</a>
                    </span>
                  </div>
                  <span class="price">
                    <del>
                      <span>$500.00</span>
                    </del>
                    <ins>
                      <span class="amount">$230.00</span>
                    </ins>
                  </span>
                </div>
              </div>

            </div> <!-- end slider -->

          </div> <!-- end new items -->

          <!-- Top Rated -->
          <div class="tab-pane fade in" id="top-rated">

            <div id="owl-shop-items-slider-3" class="owl-carousel owl-theme">
              <div class="product">
                <div class="product-item hover-trigger">
                  <div class="product-img">
                    <a href="/frontend/shop-single.html">
                      <img src="/frontend/img/shop/shop_item_3.jpg" alt="">
                      <img src="/frontend/img/shop/shop_item_back_3.jpg" alt="" class="back-img">
                    </a>
                    <div class="product-label">
                      <span class="sale">sale</span>
                    </div>
                    <div class="hover-2">                    
                      <div class="product-actions">
                        <a href="/frontend/#" class="product-add-to-wishlist">
                          <i class="fa fa-heart"></i>
                        </a>
                      </div>                        
                    </div>
                    <a href="/frontend/#" class="product-quickview">Quick View</a>
                  </div>
                  <div class="product-details">                      
                    <h3 class="product-title">
                      <a href="/frontend/shop-single.html">Tribal Grey Blazer</a>
                    </h3>
                    <span class="category">
                      <a href="/frontend/catalogue-grid.html">Women</a>
                    </span>
                  </div>
                  <span class="price">
                    <del>
                      <span>$730.00</span>
                    </del>
                    <ins>
                      <span class="amount">$399.99</span>
                    </ins>
                  </span>
                </div>
              </div>

              <div class="product">
                <div class="product-item hover-trigger">
                  <div class="product-img">
                    <a href="/frontend/shop-single.html">
                      <img src="/frontend/img/shop/shop_item_11.jpg" alt="">
                      <img src="/frontend/img/shop/shop_item_back_11.jpg" alt="" class="back-img">
                    </a>
                    <div class="hover-2">                    
                      <div class="product-actions">
                        <a href="/frontend/#" class="product-add-to-wishlist">
                          <i class="fa fa-heart"></i>
                        </a>
                      </div>                        
                    </div>
                    <a href="/frontend/#" class="product-quickview">Quick View</a>
                  </div>
                  <div class="product-details">                      
                    <h3 class="product-title">
                      <a href="/frontend/shop-single.html">Mantle Brown Bag</a>
                    </h3>
                    <span class="category">
                      <a href="/frontend/catalogue-grid.html">Accessories</a>
                    </span>
                  </div>
                  <span class="price">
                    <ins>
                      <span class="amount">$150.00</span>
                    </ins>
                  </span>
                </div>
              </div>

              <div class="product">
                <div class="product-item hover-trigger">
                  <div class="product-img">
                    <a href="/frontend/shop-single.html">
                      <img src="/frontend/img/shop/shop_item_6.jpg" alt="">
                      <img src="/frontend/img/shop/shop_item_back_6.jpg" alt="" class="back-img">
                    </a>
                    <div class="hover-2">                    
                      <div class="product-actions">
                        <a href="/frontend/#" class="product-add-to-wishlist">
                          <i class="fa fa-heart"></i>
                        </a>
                      </div>                        
                    </div>
                    <a href="/frontend/#" class="product-quickview">Quick View</a>
                  </div>
                  <div class="product-details">                      
                    <h3 class="product-title">
                      <a href="/frontend/shop-single.html">Faux Suits</a>
                    </h3>
                    <span class="category">
                      <a href="/frontend/catalogue-grid.html">Men</a>
                    </span>
                  </div>
                  <span class="price">
                    <ins>
                      <span class="amount">$233.00</span>
                    </ins>
                  </span>
                </div>
              </div>

              <div class="product">
                <div class="product-item hover-trigger">
                  <div class="product-img">
                    <a href="/frontend/shop-single.html">
                      <img src="/frontend/img/shop/shop_item_4.jpg" alt="">
                      <img src="/frontend/img/shop/shop_item_back_4.jpg" alt="" class="back-img">
                    </a>
                    <div class="hover-2">                    
                      <div class="product-actions">
                        <a href="/frontend/#" class="product-add-to-wishlist">
                          <i class="fa fa-heart"></i>
                        </a>
                      </div>                        
                    </div>
                    <a href="/frontend/#" class="product-quickview">Quick View</a>
                  </div>
                  <div class="product-details">                      
                    <h3 class="product-title">
                      <a href="/frontend/shop-single.html">Sweater w/ Colar</a>
                    </h3>
                    <span class="category">
                      <a href="/frontend/catalogue-grid.html">Men</a>
                    </span>
                  </div>
                  <span class="price">
                    <ins>
                      <span class="amount">$299.00</span>
                    </ins>
                  </span>
                </div>
              </div>

              <div class="product">
                <div class="product-item hover-trigger">
                  <div class="product-img">
                    <a href="/frontend/shop-single.html">
                      <img src="/frontend/img/shop/shop_item_5.jpg" alt="">
                      <img src="/frontend/img/shop/shop_item_back_5.jpg" alt="" class="back-img">
                    </a>
                    <div class="hover-2">                    
                      <div class="product-actions">
                        <a href="/frontend/#" class="product-add-to-wishlist">
                          <i class="fa fa-heart"></i>
                        </a>
                      </div>                        
                    </div>
                    <a href="/frontend/#" class="product-quickview">Quick View</a>
                  </div>
                  <div class="product-details">                      
                    <h3 class="product-title">
                      <a href="/frontend/shop-single.html">Lola May Crop Blazer</a>
                    </h3>
                    <span class="category">
                      <a href="/frontend/catalogue-grid.html">Women</a>
                    </span>
                  </div>
                  <span class="price">
                    <ins>
                      <span class="amount">$42.00</span>
                    </ins>
                  </span>
                </div>
              </div>

              <div class="product">
                <div class="product-item hover-trigger">
                  <div class="product-img">
                    <a href="/frontend/shop-single.html">
                      <img src="/frontend/img/shop/shop_item_6.jpg" alt="">
                      <img src="/frontend/img/shop/shop_item_back_6.jpg" alt="" class="back-img">
                    </a>
                    <div class="product-label">
                      <span class="sale">sale</span>
                    </div>
                    <div class="hover-2">                    
                      <div class="product-actions">
                        <a href="/frontend/#" class="product-add-to-wishlist">
                          <i class="fa fa-heart"></i>
                        </a>
                      </div>                        
                    </div>
                    <a href="/frontend/#" class="product-quickview">Quick View</a>
                  </div>
                  <div class="product-details">                      
                    <h3 class="product-title">
                      <a href="/frontend/shop-single.html">Faux Suits</a>
                    </h3>
                    <span class="category">
                      <a href="/frontend/catalogue-grid.html">Men</a>
                    </span>
                  </div>
                  <span class="price">
                    <del>
                      <span>$500.00</span>
                    </del>
                    <ins>
                      <span class="amount">$233.00</span>
                    </ins>
                  </span>
                </div>
              </div>

            </div> <!-- end slider -->

          </div> <!-- end top rated -->


        </div>

        </div>
      </section> <!-- end tabs/slider products -->


      <!-- Promo Section -->
      <section class="section-wrap relative overlay promo-bg" style="background-image: url(/frontend/img/promo_bg.jpg);">
        <div class="container text-center">
          <div class="table-box">
            <h2 class="uppercase white">autumn collection</h2>
            <p class="uppercase white">prepare for coming winter. Shop All New Items Here</p>
            <a href="/frontend/#" class="btn btn-lg btn-transparent"><span>Shop Now</span></a>
          </div>
        </div>
      </section> <!-- end promo section -->


      <!-- From Blog -->
      <section class="section-wrap from-blog pb-40">
        <div class="container-fluid"> 

          <div class="row heading-row">
            <div class="col-md-12 text-center">
              <span class="subheading">Latest News</span>
              <h2 class="heading bottom-line">
                From Blog
              </h2>
            </div>
          </div>

          <div class="row">

            <article class="col-md-4 col-sm-6 col-xs-12 nopadding">
              <div class="entry-item">
                <div class="entry-img">
                  <a href="/frontend/blog-single.html" class="hover-scale">
                    <img src="/frontend/img/blog/blog_1.jpg" alt="">
                  </a>
                </div>
                <div class="entry-wrap">
                  <div class="entry">                      
                    <h4 class="entry-title"><a href="/frontend/blog-single.html">Meeting with partners</a></h4>
                    <ul class="entry-meta">
                      <li class="entry-date">
                        <i class="fa fa-calendar-o"></i>
                        19 Sept, 2017
                      </li>
                      <li class="entry-comments">
                        <i class="fa fa-comment"></i>
                        <a href="/frontend/blog-single.html">15 Comments</a>
                      </li>
                    </ul>
                  </div>
                </div>                
              </div>
            </article> <!-- end post -->

            <article class="col-md-4 col-sm-6 col-xs-12 nopadding">
              <div class="entry-item">
                <div class="entry-img">
                  <a href="/frontend/blog-single.html" class="hover-scale">
                    <img src="/frontend/img/blog/blog_2.jpg" alt="">
                  </a>
                </div>
                <div class="entry-wrap">
                  <div class="entry">                      
                    <h4 class="entry-title"><a href="/frontend/blog-single.html">The top 10 creative ideas</a></h4>
                    <ul class="entry-meta">
                      <li class="entry-date">
                        <i class="fa fa-calendar-o"></i>
                        19 Sept, 2017
                      </li>
                      <li class="entry-comments">
                        <i class="fa fa-comment"></i>
                        <a href="/frontend/blog-single.html">15 Comments</a>
                      </li>
                    </ul>
                  </div>
                </div>               
              </div>
            </article> <!-- end post -->

            <article class="col-md-4 col-sm-6 col-xs-12 nopadding">
              <div class="entry-item">
                <div class="entry-img">
                  <a href="/frontend/blog-single.html" class="hover-scale">
                    <img src="/frontend/img/blog/blog_3.jpg" alt="">
                  </a>
                </div>
                <div class="entry-wrap">
                  <div class="entry">                    
                    <h4 class="entry-title"><a href="/frontend/blog-single.html">How to increase the profit</a></h4>
                    <ul class="entry-meta">
                      <li class="entry-date">
                        <i class="fa fa-calendar-o"></i>
                        19 Sept, 2017
                      </li>
                      <li class="entry-comments">
                        <i class="fa fa-comment"></i>
                        <a href="/frontend/blog-single.html">15 Comments</a>
                      </li>
                    </ul>
                  </div>
                </div>                
              </div>
            </article> <!-- end post -->

          </div>
        </div>
      </section> <!-- end from blog -->


      <!-- Partners -->
      <section class="section-wrap partners bg-dark">
        <div class="container">
          <div class="row">

            <div id="owl-partners" class="owl-carousel owl-theme">

              <div class="item">
                <a href="/frontend/#">
                  <img src="/frontend/img/partners/partner_logo_1.png" alt="">
                </a>
              </div>
              <div class="item">
                <a href="/frontend/#">
                  <img src="/frontend/img/partners/partner_logo_2.png" alt="">
                </a>
              </div>
              <div class="item">
                <a href="/frontend/#">
                  <img src="/frontend/img/partners/partner_logo_3.png" alt="">
                </a>
              </div>
              <div class="item">
                <a href="/frontend/#">
                  <img src="/frontend/img/partners/partner_logo_4.png" alt="">
                </a>
              </div>
              <div class="item">
                <a href="/frontend/#">
                  <img src="/frontend/img/partners/partner_logo_5.png" alt="">
                </a>
              </div>
              <div class="item">
                <a href="/frontend/#">
                  <img src="/frontend/img/partners/partner_logo_6.png" alt="">
                </a>
              </div>
              <div class="item">
                <a href="/frontend/#">
                  <img src="/frontend/img/partners/partner_logo_1.png" alt="">
                </a>
              </div>
              <div class="item">
                <a href="/frontend/#">
                  <img src="/frontend/img/partners/partner_logo_2.png" alt="">
                </a>
              </div>

            </div> <!-- end carousel -->
            
          </div>
        </div>
      </section> <!-- end partners -->
@endsection