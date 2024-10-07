<x-layouts.blank>
  
    <!-- Login Wrapper Area -->
    <div class="login-wrapper d-flex align-items-center justify-content-center">
      <div class="custom-container">
        <div class="text-center px-4">
          <img class="login-intro-img" src="{{ asset("img/bg-img/reset-password-image.svg") }}" alt="">
        </div>
  
        <!-- Register Form -->
        <div class="register-form mt-4">
          <h6 class="mb-3 text-center">Update Password</h6>
  
          <x-form.validation-alert/>
  
          <form action="{{ route('password.store') }}" method="post">
            @csrf
          <x-form.password-input />
          <x-form.password-input placeholder="Confrim Password" name="password_confirmation" />
          <button class="btn btn-theme w-100" type="submit">Reset Password</button>

          </form>
  
        </div>
      </div>
    </div>
  
  </x-layouts.blank>