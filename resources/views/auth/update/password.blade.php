<x-layouts.blank>


    <!-- Back Button -->
<div class="login-back-button">
  <a href="{{ route('profile.show') }}">
    <i class="bi bi-arrow-left-short"></i>
  </a>
</div>

<!-- Login Wrapper Area -->
<div class="login-wrapper d-flex align-items-center justify-content-center">
  <div class="custom-container">
    <div class="text-center px-4">
      <img class="login-intro-img" src="{{ asset("img/bg-img/new-password-image.svg") }}" alt="">
    </div>

    <!-- Register Form -->
    <div class="register-form mt-4">
      <div class="text-center mb-2">
          <h6>Update password</h6>
      </div>
      <x-form.validation-alert/>

      <form action="{{ route('password_update.update') }}" method="post">
        @csrf
        @method("PUT")
        <x-form.password-input  label="Current Password" name="current" placeholder="Current Password" />
        <x-form.password-input  label="New Password" name="password" placeholder="New Password" />
        <x-form.password-input  label="Confirm Password" name="password_confirmation" placeholder="Confirm Password" />
        <button class="btn btn-theme w-100" type="submit">Update</button>
      </form>

  </div>

  </div>
</div>

</x-layouts.blank>