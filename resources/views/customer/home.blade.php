@extends('../layouts.customer')
@section('navbar')
    @include('../partials.customer.navbar')
@endsection

@section('content')
<header class="py-5" style="
background: #FBD3E9;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #BB377D, #FBD3E9);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #BB377D, #FBD3E9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">{{ trans('panel.site_title') }}</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach($products as $product)
                <div class="col mb-5">
                    <div class="card h-100">
                        <div class="badge bg-dark text-white position-absolute text-uppercase" style="top: 0.5rem; right: 0.5rem">{{$product->category->name ?? ''}}</div>
                        <!-- Product image-->
                        <img class="card-img-top" width="200" height="190" src="/assets/img/products/{{$product->image ?? ''}}" alt="{{$product->image ?? ''}}" />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$product->name ?? ''}}</h5>
                                <!-- Product price-->
                                @foreach($product->products_sizes_prices()->get() as $product_size)
                                {{$product_size->size->name ?? ''}} ₱{{$product_size->price ?? ''}}
                                @endforeach
                                
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-primary mt-auto" href="#">BUY</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
          
           
        </div>
    </div>
</section>
@endsection

@section('script')
<script>

</script>
@endsection






