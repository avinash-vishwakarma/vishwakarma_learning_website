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
          <img class="login-intro-img" src="{{ asset("/img/bg-img/forgot-password-image.svg") }}" alt="Forgot Password">
        </div>
  
        <!-- Register Form -->
        <div class="register-form mt-4">
          <h6 class="mb-3 text-center">Forgot Password</h6>
          <x-form.validation-alert/>
          <form action="{{ route('password.number') }}" method="post">
            @csrf
              <x-form.phone-input name="number" id="number" placeholder="Enter registered number" />
            <button class="btn btn-theme w-100" type="submit">Forgot Password</button>
          </form>
        </div>
  
      </div>
    </div>
  
  </x-layouts.blank>