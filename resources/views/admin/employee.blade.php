@extends('../layouts.admin')
@section('sub-title','Employees')
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
                            <div class="col-md-10">
                                <h4 class="mb-0 text-uppercase" id="titletable">Manage Employees</h4>
                            </div>
                            <div class="col-md-2">
                                <button type="button" name="create_record" id="create_record" class="text-uppercase create_record btn btn-sm btn-primary">NEW EMPLOYEE</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table datatable-table display" cellspacing="0" width="100%">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ACTIONS</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">CONTACT NUMBER</th>
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">GENDER</th>
                                    <th scope="col">POSTION</th>
                                    <th scope="col">ACCOUNT ROLE</th>
                                    <th scope="col">CREATED AT</th>
                                </tr>
                            </thead>
                            <tbody class="text-uppercase font-weight-bold">
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>
                                         
                                            <button type="button" name="edit" edit="{{  $employee->id ?? '' }}"  class="edit btn btn-sm btn-primary">Edit</button>
                                            <button type="button" name="remove" remove="{{  $employee->id ?? '' }}" class="remove btn btn-sm btn-danger">Remove</button>
                                            
                                        </td>
                                        <td>
                                            {{  $employee->name ?? '' }}
                                        </td>
                                        <td>
                                            {{  $employee->contact_number ?? '' }}
                                        </td>
                                        <td>
                                            {{  $employee->address ?? '' }}
                                        </td>
                                        <td>
                                            {{  $employee->gender ?? '' }}
                                        </td>
                                        <td>
                                            {{  $employee->position ?? '' }}
                                        </td>
                                        <td>
                                            {{  $employee->user->role ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->created_at->format('M j , Y h:i A') }}
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

    <form method="post" id="myForm" class="contact-form">
        @csrf
        <div class="modal fade" id="formModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times text-primary"></i>
                    </button>
        
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Name: <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" >
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-name"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label class="form-label">Contact Number: <span class="text-danger">*</span></label>
                                        <input type="number" name="contact_number" id="contact_number" class="form-control" >
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-contact_number"></strong>
                                        </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label class="form-label">Gender: <span class="text-danger">*</span></label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-gender"></strong>
                                        </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label class="form-label">Position: <span class="text-danger">*</span></label>
                                        <input type="text" name="position" id="position" class="form-control" >
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-position"></strong>
                                        </span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                        <label class="form-label">Address: <span class="text-danger">*</span></label>
                                        <input type="text" name="address" id="address" class="form-control" >
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-address"></strong>
                                        </span>
                                </div>
                            </div>
                        </div>
                        

                        <input type="hidden" name="action" id="action" value="Add" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="action_button" id="action_button" class="btn  btn-primary" value="Save" />
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
    'columnDefs': [{ 'orderable': false, 'targets': 0 }],
    });

    var table = $('.datatable-table:not(.ajaxTable)').DataTable({ buttons: dtButtons });
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
        });

    });

$(document).on('click', '#create_record', function(){
    $('#formModal').modal('show');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    $('.modal-title').text('ADD EMPLOYEE');
    $('#action_button').val('Submit');
    $('#action').val('Add');
});

$('#myForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('admin.employees.store') }}";
    var type = "POST";

    if($('#action').val() == 'Edit'){
        var id = $('#hidden_id').val();
        action_url = "/admin/employees/" + id;
        type = "PUT";
    }

    $.ajax({
        url: action_url,
        method:type,
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
            $("#action_button").attr("disabled", true);
        },
        success:function(data){
           $("#action_button").attr("disabled", false);
          
            if(data.errors){
                $.each(data.errors, function(key,value){
                    if(key == $('#'+key).attr('id')){
                        $('#'+key).addClass('is-invalid')
                        $('#error-'+key).text(value)
                    }
                    if(key == 'image'){
                        $('.image').addClass('is-invalid')
                        $('#error-image').text(value)
                    }
                })
            }
            if(data.success){
                $('.form-control').removeClass('is-invalid')
                $('#myForm')[0].reset();
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
                $('#formModal').modal('hide');
            }
            
        }
    });
});

$(document).on('click', '.edit', function(){
    $('#formModal').modal('show');
    $('.modal-title').text('EDIT EMPLOYEE');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid');

    var id = $(this).attr('edit');

    $.ajax({
        url :"/admin/employees/"+id+"/edit",
        dataType:"json",
        beforeSend:function(){
            $("#action_button").attr("disabled", true);
        },
        success:function(data){
            $("#action_button").attr("disabled", false);
            
            $.each(data.result, function(key,value){
                if(key == $('#'+key).attr('id')){
                    $('#'+key).val(value)
                }
            })

            $('#hidden_id').val(id);
            $('#action_button').val('Update');
            $('#action').val('Edit');
        }
    })
});

$(document).on('click', '.remove', function(){
  var id = $(this).attr('remove');
  $.confirm({
      title: 'Confirmation',
      content: 'You really want to remove this record?',
      type: 'red',
      buttons: {
          confirm: {
              text: 'confirm',
              btnClass: 'btn-blue',
              keys: ['enter', 'shift'],
              action: function(){
                  return $.ajax({
                      url:"/admin/employees/"+id,
                      method:'DELETE',
                      data: {
                          _token: '{!! csrf_token() !!}',
                      },
                      dataType:"json",
                      beforeSend:function(){
                        $('#titletable').text('Loading...');
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




