<x-layouts.blank>


    <!-- Back Button -->
<div class="login-back-button">
  <a href="{{ url()->previous() }}">
    <i class="bi bi-arrow-left-short"></i>
  </a>
</div>

<!-- Login Wrapper Area -->
<div class="login-wrapper d-flex align-items-center justify-content-center">
  <div class="custom-container">
    <div class="text-center px-4">
      <img class="login-intro-img" src="{{ asset("img/bg-img/update-number-image.svg") }}" alt="">
    </div>

    <!-- Register Form -->
    <div class="register-form mt-4">
      <div class="text-center mb-2">
          <h6>Update Number</h6>
          <p>First Confirm your Password</p>
      </div>
      <x-form.validation-alert/>

      <form action="{{ route('number_update.update') }}" method="post">
        @csrf
        <x-form.password-input  label="Confrim Your Password" placeholder="Enter Your Password" />
        <button class="btn btn-theme w-100" type="submit">Verify</button>
      </form>

  </div>

  </div>
</div>

</x-layouts.blank>