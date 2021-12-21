@extends('../layouts.site')
@section('sub-title','HOME')

@section('navbar')
    @include('../partials.site.navbar')
@endsection

@section('content')
<div class="container-fluid px-2 px-md-4">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
      </div>
    <div class="card card-body mx-3 mx-md-4 mt-n10">
        <div class="row gx-4 mb-2">
        
         
        </div>
        <div class="row">
            <div class="row">
                
                <div class="col-12 mt-4">
                    <div class="row gx-4 mb-2">
                    
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    ORDERS HISTORY
                                </h5>
                            </div>
                        </div>
                        @if (Auth::user())
                            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                                <div class="nav-wrapper position-relative end-0">
                                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                        <li class="nav-item" id="nav_product">
                                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                                <i class="material-icons text-lg position-relative">home</i>
                                                <span class="ms-1">PRODUCTS</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="nav_orders">
                                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                                <i class="material-icons text-lg position-relative">email</i>
                                                <span class="ms-1">ORDERS</span>
                                            </a>
                                        </li>
                                        
                                        
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                   
                    <div class="row">
                        <div class="col-md-8 mt-4 mx-auto">
                            <div class="card h-100 mb-4">
                                    <div class="card-header pb-0 px-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="mb-0">Your Pending Orders</h6>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="card-body pt-4 p-3">
                                        <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
                                            <ul class="list-group">
                                                @foreach($orders as $order)
                                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                        <div class="d-flex align-items-center">
                                                            <button class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-shopping-cart" style="font-size: 17px"></i></button>
                                                            <div class="d-flex flex-column">
                                                            <h6 class="mb-1 text-dark text-sm">
                                                                @foreach ($order->orderproducts as $orderproduct)
                                                                    {{$orderproduct->product->name}},
                                                                @endforeach
                                                            </h6>
                                                                <span class="text-xs">{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y / h:i:s A')}}</span>
                                                                <span class="text-xs mt-2 text-warning">{{$order->status}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center font-weight-bold">
                                                            <span class="text-success">₱ </span> {{ $order->orderproducts->sum('amount')}} 
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-8 mt-4 mx-auto">
                            <div class="card h-100 mb-4">
                                    <div class="card-header pb-0 px-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="mb-0">Your Approved Orders</h6>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="card-body pt-4 p-3">
                                        <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
                                            <ul class="list-group">
                                                @foreach($orders_approved as $order)
                                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                        <div class="d-flex align-items-center">
                                                            <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-shopping-cart" style="font-size: 17px"></i></button>
                                                            <div class="d-flex flex-column">
                                                            <h6 class="mb-1 text-dark text-sm">
                                                                @foreach($order->orderproducts as $product_order)
                                                                    <span class="badge bg-success">{{$product_order->qty}} {{$product_order->product->name}} * {{$product_order->product->price}} = {{$product_order->amount}}</span> <br>
                                                                @endforeach
                                                            </h6>
                                                                <span class="text-xs">{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y / h:i:s A')}}</span>
                                                                <span class="text-xs mt-2 text-success">{{$order->status}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center font-weight-bold">
                                                            <span class="text-success">₱ </span> {{ $order->orderproducts->sum('amount')}} 
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                    </div>
                            </div>
                        </div>
                    </div>
                   
                   
                </div>
            </div>
       </div>
  </div>
</div>

 
@section('footer')
    @include('../partials.site.footer')
@endsection
@endsection





@section('script')
<script> 

$(document).on('click', '#nav_product', function(){
    $(location).attr('href',"/");
});
$(document).on('click', '#nav_orders', function(){
    $(location).attr('href',"/customer/orders");
});

</script>
@endsection