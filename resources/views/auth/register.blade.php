@extends('../layouts.site')
@section('sub-title','Register')

@section('navbar')
    @include('../partials.site.navbar')
@endsection

@section('content')
<div class="container my-auto mt-8 mb-6">
    <div class="row">
        <div class="col-lg-10 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign up</h4>
                  <div class="row mt-3">
                
                  </div>
              </div>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                          <label class="form-label">Email <span class="text-danger">*</span></label>
                          <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                          @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                          <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                          <input type="number" id="contact_number" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror" value="{{ old('contact_number') }}"   required autocomplete="contact_number">
                          @error('contact_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                          <label class="form-label">Address <span class="text-danger">*</span></label>
                          <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}"   required autocomplete="address">
                          @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                    </div>
                    <div class="col-6">
                       <div class="form-group">
                          <label class="form-label text-uppercase" >Upload( ID )<span class="text-danger">*</span></label>
                          <input type="file" id="upload_id" name="upload_id" accept="image/*" class="classic-input form-control font-weight-bold @error('upload_id') is-invalid @enderror">
                          @error('upload_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-6">
                        <div class="form-group">
                            <label class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"  id="password"  name="password" required autocomplete="new-password" >
                        
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                            <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation"  required autocomplete="new-password">
                        </div>
                      </div>
                    </div>
                    
                  </div>

                      <div class="text-center">
                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign up</button>
                      </div>
                      <p class="mt-4 text-sm text-center">
                        Already a member?
                        <a href="/login" class="text-primary text-gradient font-weight-bold">Sign in</a>
                      </p>
                </form>
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