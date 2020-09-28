@extends('layouts.default')


@section('content')
<style>
    .css3 img{
        height: 200px;
        width:200px
	}
	.wmuSlider .wmuSliderWrapper article img {
		height:350px;
		
	}
</style>
<div class="header-bottom">
   	<div class="wrap">
   		<!-- start header menu -->
		
       <div class="index-banner">
       	  <div class="wmuSlider example1" style="height: 560px;">
			  <div class="wmuSliderWrapper">
				  <article style="position: relative; width: 100%; opacity: 1;"> 
				   	<div class="banner-wrap">
					   	<div class="slider-left">
							<img src="storage/images/banner_piano-1400x365.jpg" alt=""/> 
						</div>
						 <div class="slider-right">
						    <h1>Classic</h1>
						    <h2>White</h2>
						    <p>Lorem ipsum dolor sit amet</p>
						    <div class="btn"><a href="shop.html">Shop Now</a></div>
						 </div>
						 <div class="clear"></div>
					 </div>
					</article>
				   
				</div>
                <a class="wmuSliderPrev">Previous</a><a class="wmuSliderNext">Next</a>
                <ul class="wmuSliderPagination">
                	<li><a href="#" class="">0</a></li>
                	<li><a href="#" class="">1</a></li>
                	<li><a href="#" class="wmuActive">2</a></li>
                	<li><a href="#">3</a></li>
                	<li><a href="#">4</a></li>
                  </ul>
                 <a class="wmuSliderPrev">Previous</a><a class="wmuSliderNext">Next</a><ul class="wmuSliderPagination"><li><a href="#" class="wmuActive">0</a></li><li><a href="#" class="">1</a></li><li><a href="#" class="">2</a></li><li><a href="#" class="">3</a></li><li><a href="#" class="">4</a></li></ul></div>
            	 <script src="js/jquery.wmuSlider.js"></script> 
				 <script type="text/javascript" src="js/modernizr.custom.min.js"></script> 
						<script>
       						 $('.example1').wmuSlider();         
   						</script> 	           	      
             </div>
             <div class="main">
                <div class="wrap">
             	  <div class="content-top">
             		<div class="lsidebar span_1_of_c1">
					  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing</p>
					</div>
					<div class="cont span_2_of_c1">
					  <div class="social">	
					     <ul>	
						  <li class="facebook"><a href="#"><span> </span></a><div class="radius"> <img src="storage/images/radius.png"><a href="#"> </a></div><div class="border hide"><p class="num">1.51K</p></div></li>
						 </ul>
			   		   </div>
					   <div class="social">	
						   <ul>	
							  <li class="twitter"><a href="#"><span> </span></a><div class="radius"> <img src="storage/images/radius.png"></div><div class="border hide"><p class="num">1.51K</p></div></li>
						  </ul>
			     		</div>
						 <div class="social">	
						   <ul>	
							  <li class="google"><a href="#"><span> </span></a><div class="radius"> <img src="storage/images/radius.png"></div><div class="border hide"><p class="num">1.51K</p></div></li>
						   </ul>
			    		 </div>
						 <div class="social">	
						   <ul>	
							  <li class="dot"><a href="#"><span> </span></a><div class="radius"> <img src="storage/images/radius.png"></div><div class="border hide"><p class="num">1.51K</p></div></li>
						  </ul>
			     		</div>
						<div class="clear"> </div>
					  </div>
					  <div class="clear"></div>			
				   </div>
				  <div class="content-bottom">
				   <div class="box1">
                   @foreach($products as $item1)
				    <div class="col_1_of_3 span_1_of_3">
				     <div class="view view-fifth"> 
				  	  <div class="top_box">
					  	<h3 class="m_1" ><a href="{{ url('/product/' . $item1->id . '/' . Str::slug($item1->product_name, '-')) }}">{{ mb_substr( $item1->product_name,0,20 )}}</a></h3>
					  	<p class="m_2">{{ mb_substr($item1->product_description,0, 100) }} </p>
				         <div class="grid_img">
						   <div class="css3"><img src="{{ asset('storage/images/' . $item1->product_image) }}" alt="Card image cap" onclick="getProduct('{{route('product.productAjax', $item1->id) }}')"/></div>
					          <div class="mask">
	                       		<div class="info">Quick View</div>
			                  </div>
	                    </div>
						<div class="price"><p>{{ mb_substr($item1->product_price,0, 20) }} đ</p></div>
					   </div>
					    </div>
					   <span class="rating">
				        
				        <input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input-1">
				        <label for="rating-input-1-1" class="rating-star"></label>&nbsp;
		        	  (45)
		    	      </span>
						 <ul class="list">
						  <li>
						  	<img src="images/plus.png" alt=""/>
						  	<ul class="icon1 sub-icon1 profile_img">
                              <form method="POST" action="{{route('cart.add')}}" class="active-icon c1" >
                        @csrf
                        <input name="id" type="hidden" value="{{ $item1->id }}">
                        <button class="btn btn-success btn-block">Add to cart</button>
                    </form>
						
								<ul class="sub-icon1 list">
									<li><h3>sed diam nonummy</h3><a href=""></a></li>
									<li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
								</ul>
							  </li>
							 </ul>
						   </li>
                         </ul>
                         
			    	    <div class="clear"></div>
			    	</div>
                    @endforeach
				  <div class="clear"></div>
			  </div>
			  {{$products->links()}}
			 </div>
        </div>
<section>
        <!-- <div class="main_content">
            <div class="container">
                
                <div class="top_content">
                    <div class="row">
                    @foreach($products as $item)
                        <div class="col-md">
                            <div class="item">
                                <a href="#" class="btn btn-add">
                                <img class="card-img-top" src="{{ asset('storage/images/' . $item->product_image) }}" alt="Card image cap" onclick="getProduct('{{route('product.productAjax', $item->id) }}')" >
                                </a>
                                <div class="link1">
                                <p><a href="{{ url('/product/' . $item->id . '/' . Str::slug($item->product_name, '-')) }}">{{ mb_substr( $item->product_name,0,20 )}}</a></p>
                                </div>
                            </div>
                        </div>  
                        @endforeach                            
                    </div>
                    {{$products->links()}}  
                </div>
                
             </div>
           </div>
        </div> -->


<!-- modal -->
<script src = "{{ asset('js/siteajax.js') }}"></script>
<div class="modal fade" id="productDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form method="POST" action="{{route('cart.add')}}" class="form-inline my-2 my-lg-0" >
        @csrf
                        <input name="id" type="hidden" value="{{ $item->id }}">
        <button class="btn btn-success btn-block" type="submit">Add to cart</button>
        </form>
      </div>
    </div>
  </div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15667.373886617066!2d106.6880956!3d10.975185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1588584826476!5m2!1svi!2s" width="50%" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
@endsection


