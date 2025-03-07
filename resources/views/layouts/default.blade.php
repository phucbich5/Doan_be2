<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>nhac cu </title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{ asset('https://use.fontawesome.com/releases/v5.8.2/css/all.css') }}"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
<!-- start menu -->    
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- end menu -->
<!-- top scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
   <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){        
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>
</head>
<body>
  <div class="header-top">
     <div class="wrap"> 
		 
        <div class="logo">
		
            <a href="{{ route('product.index')}}"><img src="storage/images/logo.png"    alt=""/></a>
        </div>
        
        <div class="cssmenu">
        <form class="form-inline my-2 my-lg-0" role="search" method="get" id="searchform" action="{{ url('/search') }}">
                            <input class="form-control mr-sm-2" type="search" name="key" placeholder="Search"  id="s">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="searchsubmit">Search</button>
        </form>
           <ul>
           
             <li class="active"><a href="{{ url('/register')}}">Đăng Kí</a></li> 
             <li><a href="">Store Locator</a></li> 
             <li><a href="{{ url('/login')}}">Đăng Nhập</a></li> 
            
           </ul>
        </div>
        <ul class="icon2 sub-icon2 profile_img">
            <li><a href="{{route('cart.checkout')}}" style="color:black;"> Giỏ Hàng</a>
            {{Cart::getTotalQuantity()}}
                <ul class="sub-icon2 list">
                    <li><h3>Products</h3><a href=""></a></li>
                    <li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
                </ul>
            </li>
        </ul>
        <div class="clear"></div>
     </div>
   </div>
   <div class="header-bottom">
       <div class="container">
   <nav class="navbar navbar-expand-sm navbar-light ">
       <div class="container">
   <a class="nav-link" href="{{ route('product.index')}}">Home <span class="sr-only">(current)</span></a>
       <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
           aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="collapsibleNavId">
         <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
           
           <li class="grid">
           @foreach ($parentCategories as $category)
            <li class="nav-item dropdown">
              @php
              $txtDropdown = 'class="nav-link"';
			  $isDropdown = false;
              if(count($category->subcategories))
              {
                $isDropdown = true;
                $txtDropdown = 'class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
              }
              @endphp
              
              <a {!! $txtDropdown !!} href="{{ route('category.show', $category->id) }}" id="cat{{ $category->id }}">{{ $category->category_name }}</a>
              @if($isDropdown)
                  @include('layouts.partials.subCategoryList',['subcategories' => $category->subcategories])
              @endif 
            </li>
            @endforeach
           
         </ul>
         
       </div>
       </div>
       </div>
     </nav>
     </div>
	</div>
  <body>
  <div class="start">
    
    

    <main role="main">

      

        @yield('content')

    </main>
<br>
    <!-- footter -->
    <div class="footer">
             <div class="footer-top">
               <div class="wrap">
                      <div class="col_1_of_footer-top span_1_of_footer-top">
                       <ul class="f_list">
                           <li><img src="images/f_icon.png" alt=""/><span class="delivery">Free delivery on all orders over £100*</span></li>
                       </ul>
                   </div>
                   <div class="col_1_of_footer-top span_1_of_footer-top">
                      <ul class="f_list">
                           <li><img src="images/f_icon1.png" alt=""/><span class="delivery">Customer Service :<span class="orange"> (800) 000-2587 (freephone)</span></span></li>
                       </ul>
                   </div>
                   <div class="col_1_of_footer-top span_1_of_footer-top">
                      <ul class="f_list">
                           <li><img src="images/f_icon2.png" alt=""/><span class="delivery">Fast delivery & free returns</span></li>
                       </ul>
                   </div>
                  <div class="clear"></div>
             </div>
            </div>
            <div class="footer-middle">
                <div class="wrap">
                    <div class="section group">
                <div class="col_1_of_middle span_1_of_middle">
                    <dl id="sample" class="dropdown">
                    <dt><a href="#"><span>Please Select a Country</span></a></dt>
                    <dd>
                        <ul>
                            <li><a href="#">Australia<img class="flag" src="images/as.png" alt="" /><span class="value">AS</span></a></li>
                            <li><a href="#">Sri Lanka<img class="flag" src="images/srl.png" alt="" /><span class="value">SL</span></a></li>
                            <li><a href="#">Newziland<img class="flag" src="images/nz.png" alt="" /><span class="value">NZ</span></a></li>
                            <li><a href="#">Pakistan<img class="flag" src="images/pk.png" alt="" /><span class="value">Pk</span></a></li>
                            <li><a href="#">United Kingdom<img class="flag" src="images/uk.png" alt="" /><span class="value">UK</span></a></li>
                            <li><a href="#">United States<img class="flag" src="images/us.png" alt="" /><span class="value">US</span></a></li>
                        </ul>
                     </dd>
                       </dl>
                    </div>
                <div class="col_1_of_middle span_1_of_middle">
                    <ul class="f_list1">
                        <li><span class="m_8">Sign up for email and Get 15% off</span>
                        <div class="search">      
                            <input type="text" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                            <input type="submit" value="Subscribe" id="submit" name="submit">
                            <div id="response"> </div>
                         </div><div class="clear"></div>
                         </li>
                    </ul>
                </div>
                <div class="clear"></div>
               </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="wrap">
                    <div class="section group">
                <div class="col_1_of_5 span_1_of_5">
                    <h3 class="m_9">Shop</h3>
                    <ul class="sub_list">
                        <h4 class="m_10">Men</h4>
                        <li><a href="shop.html">Men's Shoes</a></li>
                        <li><a href="shop.html">Men's Clothing</a></li>
                        <li><a href="shop.html">Men's Accessories</a></li>
                    </ul>
                         <ul class="sub_list">
                            <h4 class="m_10">Women</h4>
                            <li><a href="shop.html">Women's Shoes</a></li>
                            <li><a href="shop.html">Women's Clothing</a></li>
                            <li><a href="shop.html">Women's Accessories</a></li>
                         </ul>
                         <ul class="sub_list">
                            <h4 class="m_10">Kids</h4>
                            <li><a href="shop.html">Kids Shoes</a></li>
                            <li><a href="shop.html">Kids Clothing</a></li>
                            <li><a href="shop.html">Kids Accessories</a></li>
                         </ul>
                        <ul class="sub_list">
                            <h4 class="m_10">style</h4>
                            <li><a href="shop.html">Porsche Design Sport</a></li>
                            <li><a href="shop.html">Porsche Design Shoes</a></li>
                            <li><a href="shop.html">Porsche Design Clothing</a></li>
                        </ul>
                        <ul class="sub_list">
                            <h4 class="m_10">Adidas Neo Label</h4>
                            <li><a href="shop.html">Adidas NEO Shoes</a></li>
                            <li><a href="shop.html">Adidas NEO Clothing</a></li>
                        </ul>
                        <ul class="sub_list1">
                            <h4 class="m_10">Customise</h4>
                            <li><a href="shop.html">mi adidas</a></li>
                            <li><a href="shop.html">mi team</a></li>
                            <li><a href="shop.html">new arrivals</a></li>
                        </ul>
                </div>
                <div class="col_1_of_5 span_1_of_5">
                    <h3 class="m_9">Sports</h3>
                    <ul class="list1">
                        <li><a href="shop.html">Basketball</a></li>
                        <li><a href="shop.html">Football</a></li>
                        <li><a href="shop.html">Football Boots</a></li>
                        <li><a href="shop.html">Predator</a></li>
                        <li><a href="shop.html">F50</a></li>
                        <li><a href="shop.html">Football Clothing</a></li>
                        <li><a href="shop.html">Golf</a></li>
                        <li><a href="shop.html">Golf Shoes</a></li>
                        <li><a href="shop.html">Golf Clothing</a></li>
                        <li><a href="shop.html">Outdoor</a></li>
                        <li><a href="shop.html">Outdoor Shoes</a></li>
                        <li><a href="shop.html">Outdoor Clothing</a></li>
                        <li><a href="shop.html">Rugby</a></li>
                        <li><a href="shop.html">Running</a></li>
                        <li><a href="shop.html">Running Shoes</a></li>
                        <li><a href="shop.html">Boost</a></li>
                        <li><a href="shop.html">Supernova</a></li>
                        <li><a href="shop.html">Running Clothing</a></li>
                        <li><a href="shop.html">Swimming</a></li>
                        <li><a href="shop.html">Tennis</a></li>
                        <li><a href="shop.html">Tennis Shoes</a></li>
                        <li><a href="shop.html">Tennis Clothing</a></li>
                        <li><a href="shop.html">Training</a></li>
                        <li><a href="shop.html">Training Shoes</a></li>
                        <li><a href="shop.html">Training Clothing</a></li>
                        <li><a href="shop.html">Training Accessories</a></li>
                        <li><a href="shop.html">miCoach</a></li>
                        <li><a href="shop.html">All Sports</a></li>
                     </ul>
                </div>
                <div class="col_1_of_5 span_1_of_5">
                    <h3 class="m_9">Originals</h3>
                    <ul class="list1">
                        <li><a href="shop.html">Originals Shoes</a></li>
                        <li><a href="shop.html">Gazelle</a></li>
                        <li><a href="shop.html">Samba</a></li>
                        <li><a href="shop.html">LA Trainer</a></li>
                        <li><a href="shop.html">Superstar</a></li>
                        <li><a href="shop.html">SL</a></li>
                        <li><a href="shop.html">ZX</a></li>
                        <li><a href="shop.html">Campus</a></li>
                        <li><a href="shop.html">Spezial</a></li>
                        <li><a href="shop.html">Dragon</a></li>
                        <li><a href="shop.html">Originals Clothing</a></li>
                        <li><a href="shop.html">Firebird</a></li>
                        <li><a href="shop.html">Originals Accessories</a></li>
                        <li><a href="shop.html">Men's Originals</a></li>
                        <li><a href="shop.html">Women's Originals</a></li>
                        <li><a href="shop.html">Kid's Originals</a></li>
                        <li><a href="shop.html">All Originals</a></li>
                    </ul>
                </div>
                <div class="col_1_of_5 span_1_of_5">
                    <h3 class="m_9">Product Types</h3>
                    <ul class="list1">
                        <li><a href="shop.html">Shirts</a></li>
                        <li><a href="shop.html">Pants & Tights</a></li>
                        <li><a href="shop.html">Shirts</a></li>
                        <li><a href="shop.html">Jerseys</a></li>
                        <li><a href="shop.html">Hoodies & Track Tops</a></li>
                        <li><a href="shop.html">Bags</a></li>
                        <li><a href="shop.html">Jackets</a></li>
                        <li><a href="shop.html">Hi Tops</a></li>
                        <li><a href="shop.html">SweatShirts</a></li>
                        <li><a href="shop.html">Socks</a></li>
                        <li><a href="shop.html">Swimwear</a></li>
                        <li><a href="shop.html">Tracksuits</a></li>
                        <li><a href="shop.html">Hats</a></li>
                        <li><a href="shop.html">Football Boots</a></li>
                        <li><a href="shop.html">Other Accessories</a></li>
                        <li><a href="shop.html">Sandals & Flip Flops</a></li>
                        <li><a href="shop.html">Skirts & Dresseses</a></li>
                        <li><a href="shop.html">Balls</a></li>
                        <li><a href="shop.html">Watches</a></li>
                        <li><a href="shop.html">Fitness Equipment</a></li>
                        <li><a href="shop.html">Eyewear</a></li>
                        <li><a href="shop.html">Gloves</a></li>
                        <li><a href="shop.html">Sports Bras</a></li>
                        <li><a href="shop.html">Scarves</a></li>
                        <li><a href="shop.html">Shinguards</a></li>
                        <li><a href="shop.html">Underwear</a></li>
                    </ul>
                </div>
                <div class="col_1_of_5 span_1_of_5">
                    <h3 class="m_9">Support</h3>
                    <ul class="list1">
                       <li><a href="shop.html">Store finder</a></li>
                       <li><a href="shop.html">Customer Service</a></li>
                       <li><a href="shop.html">FAQ</a></li>
                       <li><a href="shop.html">Online Shop Contact Us</a></li>
                       <li><a href="shop.html">about adidas Products</a></li>
                       <li><a href="shop.html">Size Charts </a></li>
                       <li><a href="shop.html">Ordering </a></li>
                       <li><a href="shop.html">Payment </a></li>
                       <li><a href="shop.html">Shipping </a></li>
                       <li><a href="shop.html">Returning</a></li>
                       <li><a href="shop.html">Using out Site</a></li>
                       <li><a href="shop.html">Delivery Terms</a></li>
                       <li><a href="shop.html">Site Map</a></li>
                       <li><a href="shop.html">Gift Card</a></li>
                      
                    </ul>
                    <ul class="sub_list2">
                       <h4 class="m_10">Company Info</h4>
                       <li><a href="shop.html">About Us</a></li>
                       <li><a href="shop.html">Careers</a></li>
                       <li><a href="shop.html">Press</a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
                </div>
            </div>
            <div class="copy">
              <div class="wrap">
                    <p>© All rights reserved | Template by&nbsp;<a href="http://w3layouts.com/"> W3Layouts</a></p>
              </div>
            </div>
       </div>
       <script type="text/javascript">
            $(document).ready(function() {
            
                var defaults = {
                      containerID: 'toTop', // fading element id
                    containerHoverID: 'toTopHover', // fading element hover id
                    scrollSpeed: 1200,
                    easingType: 'linear' 
                 };
                
                
                $().UItoTop({ easingType: 'easeOutQuart' });
                
            });
        </script>
        <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
        
  </body>
</html>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
    <script src="{{ asset('js/site.js') }}"></script>
  </body>
</html>