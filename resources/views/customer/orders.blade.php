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
                                    ORDERS
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
                                            <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                                <i class="material-icons text-lg position-relative">email</i>
                                                <span class="ms-1">ORDERS</span>
                                            </a>
                                        </li>
                                        
                                        
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                   
                        
                    <div class="col-12 col-xl-10 mx-auto" style="height: 500px; overflow: auto;">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <h6 class="mb-0">All ORDERS</h6>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-group">
                                    @foreach($orders as $order)
                                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                                            <div class="avatar me-3">
                                                <img src="{{URL::asset('/assets/img/products/'.$order->product->image)}}" alt="image" class="border-radius-lg shadow">
                                            </div>
                                            <div class="d-flex align-items-start flex-column justify-content-center">
                                                <h6 class="mb-0">{{$order->product->name}}</h6>
                                                <h6 class="mb-0"><span class="text-success">₱ </span>{{$order->amount}}</h6>
                                                <p class="mb-0 text-xs text-dark font-weight-bold">QTY: {{$order->qty}}</p>
                                                <p class="mb-0 text-xs text-dark font-weight-bold">{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y / h:i:s A')}}</p>
                                                
                                            </div>
                                            <div class="ms-auto">
                                                <a class="btn btn-link pe-3 ps-0 mb-0 " href="javascript:;">EDIT</a>
                                                <a class="btn btn-link pe-3 ps-0 mb-0 " href="javascript:;">CANCEL</a>
                                            </div>
                                           
                                           
                                           
                                           
                                        </li>
                                        
                                    @endforeach

                                </ul>
                            </div>
                           
                        </div>
                        
                    </div>
                    <div class="row mx-auto mt-7 col-md-10">    
                        <div class="col-8">
                            <h6 class="mb-0">SUBTOTAL: <span class="text-success">₱ </span>{{$orders->sum('amount')}}</h6>
                            <h6 class="mb-0">TOTAL: <span class="text-success">₱ </span>{{$orders->sum('amount')}}</h6>
                        </div>  
                        <div class="col-2">
                            <button class="btn-primary btn btn-lg" id="checkout">Checkout</button>
                        </div> 
                       
                    </div>
                </div>
            </div>
       </div>
  </div>
</div>

<form method="post" id="myForm">
    @csrf
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
               
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times text-primary"></i>
                </button>
    
                </div>
                <div class="modal-body">
                  <div class="col-xl-12">
                      <div class="card card-blog card">
                          <div class="card-header p-0 mt-n4 mx-3">
                              <a class="d-block shadow-xl border-radius-xl">
                                  <img id="current_image" src="" alt="img-blur-shadow" class="border-radius-xl" width="200" style="height: 100px;">
                                  
                              </a>
                          </div>
                        <div class="card-body p-3">
                            <h5 class="mb-0" id="modal_product_name"></h5>

                            <h4>
                                <span class="text-success">₱ </span><span id="modal_product_price"></span> 
                            </h4>

                            <p class="mb-4 text-sm" id="modal_product_description">
                                
                            </p>
                          
                            <div class="form-group">
                              <div class="input-group input-group-outline my-3">
                                  <label class="form-label">QTY: <span class="text-danger">*</span></label>
                                  <input type="number" name="qty" id="qty" class="form-control disabled" onfocus="focused(this)" onfocusout="defocused(this)">
                                  <span class="invalid-feedback" role="alert">
                                      <strong id="error-qty"></strong>
                                  </span>
                              </div>
                            </div>
                        </div>
                      </div>
                  </div>

                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    
                </div>
                <div class="modal-footer">
                    <input type="submit" name="action_button" id="action_button" class="btn  btn-primary" value="Add To Cart"/>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
 
@section('footer')
    @include('../partials.site.footer')
@endsection
@endsection





@section('script')
<script> 
$(document).on('click', '.viewproduct', function(){
    $('#formModal').modal('show');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid');
    var id = $(this).attr('productid');

    $.ajax({
        url :"/view/"+id,
        dataType:"json",
        beforeSend:function(){
            $("#action_button").attr("disabled", true);
            $("#action_button").attr("value", "Loading..");  
        },
        success:function(data){
            if($('#action').val() == 'Edit'){
                $("#action_button").attr("disabled", false);
                $("#action_button").attr("value", "Update");
            }else{
                $("#action_button").attr("disabled", false);
                $("#action_button").attr("value", "Add To Cart");
            }
            $.each(data.result, function(key,value){
                if(key == 'name'){
                    $('#modal_product_name').html(value);
                }
                if(key == 'price'){
                    $('#modal_product_price').html(value);
                }
                if(key == 'description'){
                    $('#modal_product_description').html(value);
                }
                if(key == 'image'){
                    $('#current_image').attr("src", '/assets/img/products/'  + value);
                }
            })
            $('#hidden_id').val(id);
        }
    })
});

$(document).on('click', '#checkout' , function(){
    $.ajax({
        url :"/customer/checkout",
        dataType:"json",
        method:"post",
        data: {
                    _token: '{!! csrf_token() !!}',
                },
        beforeSend:function(){
            $("#checkout").attr("disabled",true);
            $("#checkout").text("Loading..");  
        },
        success:function(data){
            $("#checkout").attr("disabled",false);
            $("#checkout").text("CHECKOUT");  
            if(data.nodata){
                $('#dangerToast').addClass('show');
                $('#text_information_error').text(data.nodata);
            }
            if(data.success){
                $('#successToast').addClass('show');
                $('#text_information').text(data.success);
                    setTimeout(function() { 
                        $(location).attr('href',"/customer/orders_history");
                    }, 2000);
            }
        }
    })
});

$('#formModal').on('shown.bs.modal', function () {
    $('#qty').focus();
}) 

$(document).on('click', '#nav_orders', function(){
    $(location).attr('href',"/customer/orders");
});
$(document).on('click', '#nav_product', function(){
    $(location).attr('href',"/");
});


</script>
@endsection