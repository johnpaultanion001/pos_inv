@extends('../layouts.admin')
@section('sub-title','Dashboard')
@section('navbar')
    @include('../partials.admin.navbar')
@endsection
@section('sidebar')
    @include('../partials.admin.sidebar')
@endsection

@section('content')
<div class="container-fluid py-4">
      <div class="row">
        
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-warning text-center border-radius-xl mt-n4 position-absolute">
                <i class="fas fa-list" style="font-size: 17px"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">PRODUCTS FOR TODAY</p>
                <h4 class="mb-0">{{$products_today->count()}}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0">Total Product <span class="text-success text-sm font-weight-bolder">{{$products->count()}}</span></p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">EMPLOYEE FOR TODAY</p>
                <h4 class="mb-0">{{$employees_today->count()}}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0">Total Employees <span class="text-success text-sm font-weight-bolder">{{$employees->count()}}</span></p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="fas fa-shopping-cart" style="font-size: 17px"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">ORDERS FOR TODAY</p>
                <h4 class="mb-0">{{$orders_today->count()}}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0">Total Order <span class="text-success text-sm font-weight-bolder">{{$orders->count()}}</span></p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-danger shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="fas fa-shopping-cart" style="font-size: 17px"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">TRANSACTION FOR TODAY</p>
                <h4 class="mb-0">{{$sales_today}}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0">Total Sales <span class="text-success text-sm font-weight-bolder">{{$sales}}</span></p>
            </div>
          </div>
        </div>
        <div class="col-xl-12 mt-3">
          <div class="card">
            <div class="card-body">
            <h4 class="text-sm mb-0 text-capitalize">SALES FOR TODAY</h4>
                <div class="table-responsive">
                    <table class="table datatable-table display text-center" width="100%">
                        <thead class="thead-light">
                            <tr>
                                <th>ORDER ID</th>
                                <th>CUSTOMER</th>
                                <th>PRODUCT</th>
                                <th>PRICE</th>
                                <th>SOLD</th>
                                <th>AMOUNT</th>
                                <th>ORDER AT</th>
                            </tr>
                        </thead>
                        <tbody class="text-uppercase font-weight-bold">
                            @foreach($sales_record as $order)
                                    <tr>
                                        <td>
                                            {{$order->order->id ?? ''}}
                                        </td>
                                        <td>
                                            {{$order->order->customer ?? ''}}
                                        </td>
                                        <td>
                                            {{$order->product->name ?? ''}}
                                        </td>
                                        <td>
                                            {{$order->price ?? ''}}
                                        </td>
                                        <td>
                                            {{$order->qty ?? ''}}
                                        </td>
                                      
                                        <td>
                                            {{ number_format($order->amount ?? '' , 2, '.', ',') }}
                                            
                                        </td>
                                        <td>
                                            {{ $order->created_at->format('M j , Y h:i A') }}
                                        </td>
                                    </tr>       
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
   
   
      
    </div>
    @section('footer')
        @include('../partials.admin.footer')
    @endsection
@endsection


@section('script')
<script> 
</script>
@endsection




