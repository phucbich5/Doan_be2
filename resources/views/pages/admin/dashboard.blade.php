

@extends('layouts.app')
<style>
.card-img-top {
    height: 200px;
}
</style>

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="{{ route('product.create') }}" class="btn btn-primary">Thêm Sản Phẩm</a>
                <br>
                <br>
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="row">
                        
  <table id="dtBasicExample" class="table" width="100%">
    <thead>
      <tr>
        <th class="th-sm">Tên SP
        </th>
        <th class="th-sm">Chi Tiết
        </th>
        <th class="th-sm">Sửa 
        </th>
        <th class="th-sm">Xóa SP
        </th>
      </tr>
    </thead>
    <tbody>
    @foreach($products as $item)
      <tr>
        <td>{{ $item->product_name }}</td>
        <td>{{ mb_substr($item->product_description,0, 100) }}</td>
        <td><a href="{{ route('product.edit', $item->id) }}" class="btn btn-primary">Edit</a></td>
        <td><form action="{{ route('product.destroy', $item->id) }}" method="post" onsubmit="return confirm('Delete?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
      </tr>
      @endforeach
    </tbody>
  </table>   
</div>

<script>
  $('#dtBasicExample').dataTable();
  
</script>



@endsection
