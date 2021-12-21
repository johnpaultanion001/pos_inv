@extends('../layouts.site')
@section('sub-title','Register')

@section('navbar')
    @include('../partials.site.navbar')
@endsection

@section('content')
<div class="container my-auto">
    <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign up</h4>
                  <div class="row mt-3">
                
                  </div>
              </div>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                  @csrf
                     <div class="input-group input-group-outline my-3">
                        <label class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required autocomplete="email">
                        @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Contact Number</label>
                        <input type="number" id="contact_number" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror"   required autocomplete="contact_number">
                        @error('contact_number')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Address</label>
                        <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror"   required autocomplete="address">
                        @error('address')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"  id="password"  name="password" required autocomplete="new-password" >
                    
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation"  required autocomplete="new-password">
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