@extends('../layouts.admin')
@section('sub-title','Sales Reports')
@section('navbar')
    @include('../partials.admin.navbar')
@endsection
@section('sidebar')
    @include('../partials.admin.sidebar')
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-2">
                    <div class="card-header border-0">
                        <div class="row ">
                            <div class="col-md-9">
                                <h4 class="mb-0 text-uppercase" id="titletable">Transactions</h4>
                                <b class="mb-0 text-uppercase">{{$title_filter}}</b>
                               
                                
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="filter_dd" id="filter_dd" class="select2" style="width: 100%;">
                                        <option value="daily">FILTER BY DATE</option>
                                        <option value="daily" {{ request()->is('admin/sales_reports/daily') ? 'selected' : '' }}>DAILY</option>
                                        <option value="weekly" {{ request()->is('admin/sales_reports/weekly') ? 'selected' : '' }}>WEEKLY</option>
                                        <option value="monthly" {{ request()->is('admin/sales_reports/monthly') ? 'selected' : '' }}>MONTHLY</option>
                                        <option value="yearly" {{ request()->is('admin/sales_reports/yearly') ? 'selected' : '' }}>YEARLY</option>
                                        <option value="all" {{ request()->is('admin/sales_reports/all') ? 'selected' : '' }}>ALL</option>
                                    </select>
                                </div>
                                <button class="btn-primary btn mt-2" id="btn_summary">Summary Of Transaction</button>
                            </div> 
                            
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table datatable-table display" width="100%">
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
                                @foreach($sales as $order)
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

    <div class="modal fade" id="formModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Summary Of Transaction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times text-primary"></i>
                    </button>
                </div>
                <div class="modal-body">
                        <table class="table_summary_report" style="width: 100% !important;">
                            <thead class="thead-light">
                                <tr>
                                    <th>PRODUCT</th>
                                    <th>SOLD</th>
                                    <th>AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody class="text-uppercase font-weight-bold" id="list_summary">
                                
                            </tbody>
                        </table>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
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
$(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

    $.extend(true, $.fn.dataTable.defaults, {
    pageLength: 100,
    });

    $('.datatable-table:not(.ajaxTable)').DataTable({ buttons: dtButtons });
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
        });

        
});

$('#filter_dd').on("change", function(event){
    var date = $(this).val();
    window.location.href = '/admin/sales_reports/'+date;
});


$(document).on('click', '#btn_summary', function(){
    $.ajax({
        url: "/admin/summary_of_transaction", 
        type: "get",
        data: {_token: '{!! csrf_token() !!}'},
        dataType: "json",
        beforeSend: function() {
        },
        success: function(data){
            
            console.log(data.total_amount);
            var list = '';
            $.each(data.data, function(key,value){
                list += '<tr>';
                    list += '<td>';
                        list += value.product;
                    list += '</td>';
                    list += '<td>';
                        list += value.sold;
                    list += '</td>';
                    list += '<td>';
                        list += value.amount;
                    list += '</td>';
                list += '</tr>';
            });
            list += '<tr>';
                list += '<td>';
                    list += data.bot_product;
                list += '</td>';
                list += '<td>';
                    list += data.total_sold;
                list += '</td>';
                list += '<td>';
                    list += data.total_amount;
                list += '</td>';
            list += '</tr>';
            
            $('#list_summary').empty().append(list);
            $('#formModal').modal('show');
            table_summary_report();
        }	
    })
});

function table_summary_report(){
    var table = $('.table_summary_report').DataTable({
        bDestroy: true,
        responsive: true,
    });
     $.fn.dataTable.ext.search.push(
         function (settings, data, dataIndex){
            return (data[1] > 0) ? true : false;
         }
      );
    table.draw();
}





</script>
@endsection




