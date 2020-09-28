@extends('layouts.default')

<style>
    .card-img-top {
        height:300px;
        
    }

</style>
@section('content')

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
                <img class="card-img-top" src="{{ asset('storage/images/' . $item->product_image) }}" alt="Card image cap">
                <div class="card-body">
                    <p><a href="{{ url('/product/' . $item->id . '/' . Str::slug($item->product_name, '-')) }}">{{ $item->product_name }}</a></p>

                    <!-- <p><a href="{{ route('product.show', ['id' => $item->id, 'slug' =>  Str::slug($item->product_name, '-')]) . '.html' }}">{{ $item->product_name }}</a></p> -->

                    <p class="card-text">{{ mb_substr($item->product_description,0, 100) }}</p>
                    
                </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection


