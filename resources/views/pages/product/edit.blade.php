@extends('layouts.default')

@section('content')
<div class="container">
    <h1>Edit a product</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('product.update', $item->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name" value="{{ $item->product_name }}">
        </div>
        <div class="form-group">
            <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Product Price" value="{{ $item->product_price }}">
        </div>
        <div class="form-group">
            <textarea type="text" name="product_description" id="product_description" class="form-control" placeholder="Product Description">{{ $item->product_description }}</textarea>
        </div>
        <div class="form-group">
            <input type="file" name="product_image" id="product_image" class="form-control" placeholder="Product Image">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection