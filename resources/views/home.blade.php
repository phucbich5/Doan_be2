@extends('layouts.app')

<!-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@extends('layouts.default') -->


@section('content')
<section>
        <div class="main_content">
            <div class="container">
                <header>
                    <img src="{{ asset('storage/images/banner_piano-1400x365.jpg') }}" alt="main">
                </header>
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
                <div class="top_products">
                    <div class="container">
                        <div class="row">
                            <div class="col-md">
                                <h3>TOP PRODUCTS
                                </h3>
                            </div>
                            <div class="col-md">
                                <nav class=" navbar navbar-expand-lg navbar-light bg-while" style="padding-bottom: 0">
                                    <ul class="navbar-nav menu-info">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" style="border-bottom: 2px solid #2874f0">
                                                <h6>Featured</h6>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-md">
                                <div class="next">
                                    <a href="#"><i class="fas fa-angle-left"
                                            style="background:black;color:blanchedalmond; padding: 8px 10px;border-radius: 5px;"></i>
                                    </a>
                                    <a href="#"><i class="fas fa-angle-right"
                                            style="background:black;color:blanchedalmond; padding: 8px 10px;border-radius: 5px;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr style="padding: 0; margin: 0; width: 100%;">
                        <div class="new">
                            <div class="row">
                            @foreach($products as $item)
                                <div class="col-md">
                                    <div class="item1">
                                        <img src="./web_doan/images/p18-1-370x370.jpg" alt="">
                                        <div class="link1">
                                        <img src="{{ asset('storage/images/' . $item->product_image) }}" alt="Card image cap" class="img-fluid">
                                            <a href="#">eaarphones with mic headset</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                            {{ $products->appends(['minid' => 6, 'maxid' => 10])->links() }}
                        </div>
                    </div>
                </div>
             </div>
           </div>
        </div>
<div class="album py-5 bg-light">
  
    <div class="container">

        @if (session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

        <div class="row">
            
            @foreach($products as $item)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{ asset('storage/images/' . $item->product_image) }}" alt="Card image cap" onclick="getProduct('{{route('product.productAjax', $item->id) }}')" >
                <div class="card-body">
                    <p><a href="{{ url('/product/' . $item->id . '/' . Str::slug($item->product_name, '-')) }}">{{ $item->product_name }}</a></p>

                    <!-- <p><a href="{{ route('product.show', ['id' => $item->id, 'slug' =>  Str::slug($item->product_name, '-')]) . '.html' }}">{{ $item->product_name }}</a></p> -->

                    <p class="card-text">{{ mb_substr($item->product_description,0, 100) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('product.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('product.destroy', $item->id) }}" method="post" onsubmit="return confirm('Delete?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <form method="POST" action="{{route('cart.add')}}" class="form-inline my-2 my-lg-0" >
                        @csrf
                        <input name="id" type="hidden" value="{{ $item->id }}">
                        <button class="btn btn-success btn-block" type="submit">Add to cart</button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$products->links()}}
    </div>
</div>

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
@endsection



@endsection
