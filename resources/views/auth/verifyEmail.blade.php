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
          <img class="login-intro-img" src="{{ asset("img/bg-img/verify-email-image.svg") }}" alt="">
        </div>
        <div class="text-center mt-2">
          <p>
            A verification email has been sent to your email address <strong>{{ session()->get("email") }}</strong>
        </p>
        <p>
            kindly check your email
        </p>
        </div>
      </div>
    </div>
  
  </x-layouts.blank>