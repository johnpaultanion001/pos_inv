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
                                ALL PRODUCTS
                            </h5>
                            </div>
                        </div>
                        @if (Auth::user())
                            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                                <div class="nav-wrapper position-relative end-0">
                                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                        <li class="nav-item" id="nav_product">
                                            <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                                <i class="material-icons text-lg position-relative">home</i>
                                                <span class="ms-1">PRODUCTS</span>
                                            </a>
                                        </li>
                                        
                                        <li class="nav-item" id="nav_orders">
                                            <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" role="tab" href="javascript:;" aria-selected="false">
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
                        <div class="col-md-12 search-container">
                            <input type="text" id="search-bar" placeholder="Find a product?">
                            <img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png">
                        </div>
                    </div>
                        
                    <div class="row pt-4" style="height: 520px; overflow: auto;">
                        @foreach($products as $product)
                        <div class="col-xl-2 col-6 mb-5">
                            <div class="card card-blog card viewproduct" productid="{{  $product->id ?? '' }}">
                                <div class="card-header p-0 mt-n4 mx-3">
                                    <a class="d-block shadow-xl border-radius-xl">
                                        <img src="{{URL::asset('/assets/img/products/'.$product->image)}}" alt="img-blur-shadow" class="border-radius-xl" width="150" style="height: 100px;">
                                        
                                    </a>
                                </div>
                                <div class="card-body p-3">
                                    <h5 class="mb-0">{{$product->name}}</h5>

                                    <h4>
                                        <span class="text-success">₱</span> {{$product->price}}
                                    </h4>
                                    <p class="mb-4 text-sm text-dark">
                                        {{\Illuminate\Support\Str::limit($product->description,50)}}
                                    </p>
                                    <p class="mb-4 text-sm text-dark">
                                        Stock: @if($product->stock < 1)
                                                     OUT OF STOCK 
                                                @else
                                                    {{$product->stock}} 
                                                @endif
                                    </p>
                                    
                                    <div class="d-flex align-items-center justify-content-between">
                                        <button type="button" class="btn btn-outline-primary btn-sm mb-0">Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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

                            <p class="mb-4 text-sm text-dark" id="modal_product_description">
                                
                            </p>
                            <p class="mb-4 text-sm text-dark" id="modal_product_stock">
                                
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
        $('.modal-title').text('Edit Prorduct');
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
                    if(key == 'stock'){
                        $('#modal_product_stock').html("Stock: "+ value);
                    }
                    if(key == 'image'){
                        $('#current_image').attr("src", '/assets/img/products/'  + value);
                    }
                })
                $('#hidden_id').val(id);
            }
        })
    });

    $('#formModal').on('shown.bs.modal', function () {
        $('#qty').focus();
    }) 


    $('#myForm').on('submit', function(event){
        event.preventDefault();
        $('.form-control').removeClass('is-invalid')
        var action_url = "{{ route('customer.addtocart') }}";
        var type = "POST";

        if($('#action').val() == 'Edit'){
            // var id = $('#hidden_id').val();
            // action_url = "appointments/" + id;
            // type = "PUT";
        }

        $.ajax({
            url: action_url,
            method:type,
            data:$(this).serialize(),
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
                if(data.errors){
                    $.each(data.errors, function(key,value){
                        if(key == $('#'+key).attr('id')){
                            $('#'+key).addClass('is-invalid')
                            $('#error-'+key).text(value)
                        }
                    })
                }
                if(data.errorstock){
                    $('#qty').addClass('is-invalid');
                    $('#error-qty').text(data.errorstock);
                }
                if(data.success){
                    $('.form-control').removeClass('is-invalid')
                    $('#myForm')[0].reset();
                    $('#formModal').modal('hide');
                    $('#successToast').addClass('show');

                }
            },
            error:function() {
                $(location).attr('href',"/login");
            },
            
        });
    });

    $(document).on('click', '#nav_product', function(){
        $(location).attr('href',"/");
    });
    $(document).on('click', '#nav_orders', function(){
        $(location).attr('href',"/customer/orders");
    });


</script>
@endsection