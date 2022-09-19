@extends('../layouts.customer')
@section('navbar')
    @include('../partials.customer.navbar')
@endsection

@section('content')
<header class="py-2" style="
background: #000000;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #434343, #000000);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #434343, #000000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h4 class="">ORDERS HISTORY</h4>
        </div>
    </div>
</header>

<section class="py-5" style="min-height: 70vh;">
    <div class="row">
        <div class="col-md-8 mt-4 mx-auto">
            
            <div class="card h-100 mb-4">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0 text-uppercase">Your Orders history</h6>
                            </div>
                        
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                            <ul class="list-group">
                                @forelse($orders as $order)
                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                        <div class="d-flex align-items-center">
                                            <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="bi bi-bag-dash-fill"></i></button>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-1 text-dark text-sm">
                                                    @foreach($order->orderproducts as $product_order)
                                                        <span class="badge bg-success">{{$product_order->qty ?? ''}} {{$product_order->product->name ?? ''}} * {{$product_order->price ?? ''}} = {{$product_order->amount ?? ''}}</span> <br>
                                                    @endforeach
                                                </h6>
                                                <h6 class="text-xs text-uppercase"> {{ $order->created_at->format('M j , Y h:i A') }}</h6>
                                                
                                                <hr>
                                                <h6  class="text-s mt-2">SUBTOTAL: <span class="text-primary"> ₱  {{number_format($order->orderproducts->sum->amount?? '' , 2, '.', ',')}}</span> </h6>
                                                <h6  class="text-s mt-2">TOTAL: <span class="text-primary"> ₱  {{number_format($order->orderproducts->sum->amount?? '' , 2, '.', ',')}}</span> </h6>
                                                <h6  class="text-s mt-2 text-uppercase">CUSTOMER:   <span class="badge bg-primary"> {{$order->customer ?? ''}} </span></h6>
                                                
                                            </div>
                                        </div>
                                        
                                    </li>
                                    <hr>
                                @empty
                                <div class="text-center">
                                    <h6 class="mb-0">NO ORDERS FOUND</h6>
                                </div>
                                @endforelse
                                
                            </ul>
                    </div>
            </div>
        </div>
    </div>
    
</section>

@endsection

@section('script')
<script>
   $(document).on('click', '.cancel', function(){
        var id = $(this).attr('cancel');
        $.confirm({
            title: 'Confirmation',
            content: 'You really want to cancel this order?',
            type: 'red',
            buttons: {
                confirm: {
                    text: 'confirm',
                    btnClass: 'btn-blue',
                    keys: ['enter', 'shift'],
                    action: function(){
                        return $.ajax({
                            url:"/customer/orders/cancel/"+id,
                            method:'post',
                            data: {
                                _token: '{!! csrf_token() !!}',
                            },
                            dataType:"json",
                            beforeSend:function(){
                                $('.cancel').text('Cancelling..');
                                $(".cancel").attr("disabled", true);
                            },
                            success:function(data){
                                if(data.success){
                                    $.confirm({
                                    title: 'Confirmation',
                                    content: data.success,
                                    type: 'green',
                                    buttons: {
                                            confirm: {
                                                text: 'confirm',
                                                btnClass: 'btn-blue',
                                                keys: ['enter', 'shift'],
                                                action: function(){
                                                    location.reload();
                                                }
                                            },
                                            
                                        }
                                    });
                                }
                            }
                        })
                    }
                },
                cancel:  {
                    text: 'cancel',
                    btnClass: 'btn-red',
                    keys: ['enter', 'shift'],
                }
            }
        });
    });
</script>
@endsection






