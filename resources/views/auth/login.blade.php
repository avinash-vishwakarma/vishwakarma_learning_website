<x-layouts.blank>

    <!-- Back Button -->
    <div class="login-back-button">
      <a href="{{ route("home") }}">
        <i class="bi bi-arrow-left-short"></i>
      </a>
    </div>
  
    <!-- Login Wrapper Area -->
    <div class="login-wrapper d-flex align-items-center justify-content-center">
      <div class="custom-container">
        <div class="text-center px-4">
          <img class="login-intro-img" src="{{ asset("img/bg-img/logo-nobackground-big.svg") }}" alt="">
        </div>
  
        <!-- Register Form -->
        <div class="register-form mt-4">
          <h6 class="mb-3 text-center">Log in</h6>
  
          <x-form.validation-alert/>
  
          <form action="{{ route('login') }}" method="post">
            @csrf
            <x-form.input placeholder="Phone Number" name="number" id="number" type="number"   />
            <x-form.password-input />
            <div class="form-check mb-3">
              <input class="form-check-input" id="checkedCheckbox" type="checkbox" value="" name="remember" checked>
              <label class="form-check-label text-muted fw-normal" for="checkedCheckbox" >Remember Me</label>
            </div>
  
            <button class="btn btn-theme w-100" type="submit">logIn</button>
          </form>
  
        </div>
  
        <!-- Login Meta -->
        <div class="login-meta-data text-center">
          <a class="stretched-link forgot-password d-block mt-3 mb-1" href="{{ route('password.request') }}">Forgot
            Password?</a>
          <p class="mb-0">Didn't have an account? <a class="stretched-link" href="{{ route("register") }}">Register Now</a></p>
        </div>
      </div>
    </div>
  
  </x-layouts.blank>