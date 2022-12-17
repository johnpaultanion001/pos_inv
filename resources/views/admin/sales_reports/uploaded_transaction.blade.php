@extends('../layouts.admin')
@section('sub-title','Uploaded Transactions')
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
                                <h4 class="mb-0 text-uppercase" id="titletable">Uploaded Transactions</h4>
                                
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table datatable-table display" width="100%">
                            <thead class="thead-light">
                                <tr>
                                    <th>ACCOUNT NAME</th>
                                    <th>BRANCH</th>
                                    <th>FILE</th>
                                    <th>CREATED AT</th>
                                </tr>
                            </thead>
                            <tbody class="text-uppercase font-weight-bold">
                                @foreach($transactions as $transaction)
                                        <tr>
                                            <td>
                                                {{$transaction->user->employee->name ?? ''}}
                                            </td>
                                            <td>
                                                {{$transaction->user->employee->branch  ?? ''}}
                                            </td>
                                            <td>
                                                
                                                <a href="/assets/file/{{$transaction->file ?? ''}}" target="_blank">{{$transaction->file ?? ''}}</a>
                                            </td>
                                            <td>
                                                {{ $transaction->created_at->format('M j , Y h:i A') }}
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
</script>
@endsection




