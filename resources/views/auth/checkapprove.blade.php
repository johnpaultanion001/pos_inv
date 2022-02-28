@extends('../layouts.site')
@section('sub-title','Login')

@section('navbar')
    @include('../partials.site.navbar')
@endsection

@section('content')
<div class="container my-auto">
    <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-body">
                    <div class="card-header text-center">
                        <h3 class="card-title title-up">Thank you for registering, please wait for a response from an administrator to confirm your registration.</h3>
                    </div>
              </div>
          </div>
        </div>
    </div>
</div>
 
@endsection
@section('footer')
    @include('../partials.site.footer')
@endsection

@section('script')
<script> 

</script>
@endsection