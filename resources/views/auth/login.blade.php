@extends('../layouts.customer')


@section('content')
<header class="py-5" style="
background-image: linear-gradient(195deg, #42424a 0%, #191919 100%);
">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center">
            <h1 class="display-4 fw-bolder text-warning">{{ trans('panel.site_title') }}</h1>
            <p class="lead fw-normal text-white-50 mb-0 ">LOG IN</p>
        </div>
    </div>
</header>

<section class="py-5" style="margin-top: -100px; height: 70vh; ">
        <div class="row gx-8 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-10 justify-content-center">
           <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="text-center">
                    <img src="assets/img/logo.png" alt="logo" width="120" height="120">
                  </div>
                      <br>
                      <br>
                        <label class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        <label class="form-label">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      <div class="text-center">
                        <button type="submit" class="btn bg-primary w-100 my-4 mb-2">LOGIN</button>
                      </div>
                      <br>
                      <br>
                      <br>
                </form>
              </div>
          </div>  
        </div>
</section>
@endsection

@section('script')
<script>

</script>
@endsection






