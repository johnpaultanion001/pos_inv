@extends('../layouts.admin')
@section('sub-title','Orders')
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
                            <div class="col-md-11">
                                <h4 class="mb-0 text-uppercase" id="titletable">Manage Orders</h4>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table datatable-table display" cellspacing="0" width="100%">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ACTIONS</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">ORDER ID</th>
                                    <th scope="col">CUSTOMER NAME</th>
                                    <th scope="col">PRODUCT BUY</th>
                                    <th scope="col">AMOUNT</th>
                                    <th scope="col">ORDER AT</th>
                                </tr>
                            </thead>
                            <tbody class="text-uppercase font-weight-bold">
                                @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            <button type="button" name="receipt" receipt="{{  $order->id ?? '' }}" class="receipt btn btn-sm btn-info">Receipt</button>
                                        </td>
                                        <td>
                                            <button type="button" name="status" status="{{  $order->id ?? '' }}" class="status btn btn-sm @if($order->status == 'PENDING') btn-warning @else btn-success @endif">{{$order->status}}</button>
                                        </td>
                                        <td>
                                            {{  $order->id ?? '' }}
                                        </td>
                                        <td>
                                            {{  $order->user->name ?? '' }}
                                        </td>
                                        <td>
                                         
                                            @foreach($order->orderproducts as $product_order)
                                                <span class="badge bg-success">{{$product_order->qty}} {{$product_order->product->name}} * {{$product_order->product->price}} = {{$product_order->amount}}</span>
                                                <br>
                                            @endforeach
                                            
                                            
                                        </td>
                                        <td>
                                            <span class="text-success">₱ </span> {{ $order->orderproducts->sum('amount')}} 
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y / h:i:s A')}}
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

    <div class="modal fade" id="receiptModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title-receipt">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times text-primary"></i>
                    </button>
        
                    </div>
                    <div class="modal-body">
                        <div id="receipt_data">

                        </div>
                        
                    </div>
                    <div class="modal-footer">
                       
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                        <button type="button" class="btn btn-primary" id="btn_print">Print</button>
                        
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

$(document).on('click', '.status', function(){
    
    var id = $(this).attr('status');
    $.ajax({
        url :"/admin/orders/status/"+id,
        dataType:"json",
        method: 'put',
        data: { _token: '{!! csrf_token() !!}'},
        beforeSend:function(){
          
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
});

$(document).on('click', '.receipt', function(){
    var id = $(this).attr('receipt');
    $('#receiptModal').modal('show');

    $.ajax({
        url :"/admin/orders/receipt/"+id,
        type: "get",
        dataType: "HTMl",
        beforeSend: function() {
            $('.modal-title-receipt').text('Loading Records...');
        },
        success: function(response){
            $('.modal-title-receipt').text('Receipt');
            $("#receipt_data").html(response);
        }	
    })

});

$(document).on('click', '#btn_print', function(){
    var contents = $("#receipt_data").html();
    var frame1 = $('<iframe />');
    frame1[0].name = "frame1";
    frame1.css({ "position": "absolute", "top": "-1000000px" });
    $("body").append(frame1);
    var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
    frameDoc.document.open();
    //Create a new HTML document.
    frameDoc.document.write('<html><head><title>Title</title>');
    frameDoc.document.write('</head><body>');
    //Append the external CSS file. 
    frameDoc.document.write('<link href="/admin/css/material-dashboard.css" rel="stylesheet" type="text/css" />');
    frameDoc.document.write('<style>size: A5 portrait;</style>');
    var source = 'bootstrap.min.js';
    var script = document.createElement('script');
    script.setAttribute('type', 'text/javascript');
    script.setAttribute('src', source);
    //Append the DIV contents.
    frameDoc.document.write(contents);
    frameDoc.document.write('</body></html>');
    frameDoc.document.close();
    setTimeout(function () {
    window.frames["frame1"].focus();
    window.frames["frame1"].print();
    frame1.remove();
    }, 500);
});
</script>
@endsection




