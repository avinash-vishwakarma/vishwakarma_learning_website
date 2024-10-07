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
          <h6>Enter New Number</h6>
      </div>
      <x-form.validation-alert/>

      <form action="{{ route('number_new.update') }}" method="post">
        @csrf
        @method("PATCH")
        <x-form.input id="number" name="number"  placeholder="Enter New Number" />
        <button class="btn btn-theme w-100" type="submit"><i class="bi bi-envelope-arrow-up"></i> Submit </button>
      </form>

  </div>

  </div>
</div>

</x-layouts.blank>