<x-layouts.blank>

    <!-- Back Button -->
    <div class="login-back-button">
      <a href="{{ route("login") }}">
        <i class="bi bi-arrow-left-short"></i>
      </a>
    </div>
  
    <!-- Login Wrapper Area -->
    <div class="login-wrapper d-flex align-items-center justify-content-center">
      <div class="custom-container">
        <div class="text-center px-4">
          <img class="login-intro-img"  src="{{ asset("img/bg-img/logo-nobackground-big.svg") }}" alt="">
        </div>
  
        <!-- Register Form -->
        <div class="register-form mt-4">
          <h6 class="mb-3 text-center">Register user</h6>
  
          <x-form.validation-alert/>
          
          <form action="{{ route('register') }}" method="post" id="postForm">
            
            <div class="alert custom-alert-2 alert-danger alert-dismissible fade show d-none" role="alert">
              <i class="bi bi-x-circle"></i>
              <span></span>
              <button class="btn btn-close btn-close-white position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @csrf
  
            <x-form.input placeholder="Full Name" name="name" id="name"  />
            <x-form.phone-input placeholder="Phone Number" name="number" id="number"   />

  
            <x-form.password-input />
            <x-form.password-input placeholder="Confrim Password" name="password_confirmation" />
  
            <div class="form-check mb-3">
              <input class="form-check-input" id="checkedCheckbox" type="checkbox" checked name="terms">
              <label class="form-check-label text-muted fw-normal" for="checkedCheckbox">I agree with the terms &amp;
                policy.</label>

            </div>
            <x-form.submit-button text="Sign up"/>
          </form>
        </div>
  
        <!-- Login Meta -->
        <div class="login-meta-data text-center">
          <p class="mb-0">Already have an account <a class="stretched-link" href="{{ route("login") }}">Login</a></p>
        </div>
      </div>
    </div>
  

    @slot('js_slot')
        <script src="{{ asset('js/custom/postForm.js') }}"></script>
    @endslot

  </x-layouts.blank>