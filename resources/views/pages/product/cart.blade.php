@extends('layouts.default')

@section('content')
<div class="container">
<div class="row top-15">
    <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Giỏ hàng của bạn gồm</span>
        <span class="badge badge-secondary badge-pill">{{Cart::getContent()->count()}}</span>
      </h4>
        <ul class="list-group mb-3">
            @foreach(Cart::getContent() as $product)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">{{$product->name}}</h6>
                    <small class="text-muted">{{$product->quantity . ' x $' . $product->price}}</small>
                </div>
                <span class="text-muted">{{'$' . $product->price * $product->quantity}}</span>
            </li>
            @endforeach
            <li class="list-group-item d-flex justify-content-between">
                <span>Tổng tiền (đ)</span>
                <strong>{{Cart::getSubTotal()}}</strong>
            </li>
        </ul>
        <form action="{{route('cart.clear')}}" method="POST" class="card p-2">
            @csrf
            <div class="input-group">
                <div class="input-group">
                    <button type="submit" class="btn btn-danger">Xóa Giỏ hàng</button>
                </div>
            </div>
        </form>
        <form class="card p-2">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Mã Khuyến mãi">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary">Mua tiếp</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Địa chỉ thanh toán</h4>
        <form class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">Họ của bạn</label>
                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Tên của bạn</label>
                    <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid last name is required.
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>

            <div class="mb-3">
                <label for="address">Địa chỉ</label>
                <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                <div class="invalid-feedback">
                    Please enter your shipping address.
                </div>
            </div>
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="same-address">
                <label class="custom-control-label" for="same-address">Địa chỉ giao hàng này là địa chỉ thanh toán của tôi</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="save-info">
                <label class="custom-control-label" for="save-info">Lưu thông tin này cho lần sau</label>
            </div>
            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
                <div class="custom-control custom-radio">
                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                    <label class="custom-control-label" for="credit">Thẻ Tín Dụng</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="debit">Thẻ Ghi Nợ</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="paypal">PayPal</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cc-name">Name on card</label>
                    <input type="text" class="form-control" id="cc-name" placeholder="" required>
                    <small class="text-muted">Full name as displayed on card</small>
                    <div class="invalid-feedback">
                        Tên thẻ
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cc-number">Số Thẻ</label>
                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                    <div class="invalid-feedback">
                        Credit card number is required
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">Hết Hạn</label>
                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                    <div class="invalid-feedback">
                        Expiration date required
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cc-cvv">CVV</label>
                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                    <div class="invalid-feedback">
                        Security code required
                    </div>
                </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Tiếp tục thanh toán</button>
        </form>
    </div>
</div>
</div>
@endsection