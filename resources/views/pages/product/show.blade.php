<style>
    .card-img-top {
    width: 100%;
   
    height: 200px;
}
</style>
@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('storage/images/' . $item->product_image) }}" alt="Card image cap" class="img-fluid">
        </div>
        <div class="col-md-8">
            <h1>{{ $item->product_name }}</h1>

            <p>{{ $item->product_price }}</p>
            <p>{{ $item->product_description }}</p>

            
            <form method="POST" action="{{route('cart.add')}}" class="form-inline my-2 my-lg-0" >
                        @csrf
                        <input name="id" type="hidden" value="{{ $item->id }}">
                        <button class="btn btn-success btn-block" type="submit">Add to cart</button>
                    </form>
                    <br>
                    <h1>ĐÁNH GIÁ SẢN PHẨM</h1>
            <form action="{{ route('comment.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <textarea name="comment_content" id="comment_content" class="form-control"></textarea>
                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                    <button type="submit">Send</button>
                </div>
            </form>
            <ul>
            @foreach ($comments as $comment)
                <p>- {{ $comment->comment_content }}</p>
            @endforeach
            </ul>
            
        </div>
    </div>
</div>
@endsection