<style>
    .css3 img{
        height: 200px;
        width:200px
	}
	.wmuSlider .wmuSliderWrapper article img {
		height:350px;
		
	}
</style>
@extends('layouts.default')

@section('content')
<div class="header-bottom">
   	<div class="wrap">
   		<!-- start header menu -->	
       <div class="index-banner">
       	  <div class="wmuSlider example1" style="height: 560px;">			  
             <div class="main">
                <div class="wrap">
             	  <div class="content-bottom">
				   <div class="box1">
                       <h3>Tìm thấy  {{count ($products)}} sản Phẩm</h3>
                       
                   @foreach($products as $item)
				    <div class="col_1_of_3 span_1_of_3">
                  
				     <div class="view view-fifth">
                     
				  	  <div class="top_box">
					  	<h3 class="m_1" ><a href="{{ url('/product/' . $item->id . '/' . Str::slug($item->product_name, '-')) }}">{{ mb_substr( $item->product_name,0,20 )}}</a></h3>
					  	<p class="m_2">{{ mb_substr($item->product_description,0, 100) }}</p>
				         <div class="grid_img">
						   <div class="css3"><img src="{{ asset('storage/images/' . $item->product_image) }}" alt="Card image cap" onclick="getProduct('{{route('product.productAjax', $item->id) }}')"/></div>
					          <div class="mask">
	                       		<div class="info">Quick View</div>
			                  </div>
	                    </div>
                       <div class="price"><p>{{ mb_substr($item->product_price,0, 20) }}</p></div>
					   </div>
					    </div>
					   <span class="rating">
				        <input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input-1">
				        <label for="rating-input-1-5" class="rating-star1"></label>
				        <input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input-1">
				        <label for="rating-input-1-4" class="rating-star1"></label>
				        <input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input-1">
				        <label for="rating-input-1-3" class="rating-star1"></label>
				        <input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input-1">
				        <label for="rating-input-1-2" class="rating-star"></label>
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
                        <input name="id" type="hidden" value="{{ $item->id }}">
                        <button class="btn btn-success btn-block">Add to cart</button>                    						
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
			  </div>  
		 </div>
     </div>
</div>
@endsection
