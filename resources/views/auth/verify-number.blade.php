<x-layouts.blank>
    <div class="login-wrapper d-flex align-items-center justify-content-center">
        <div class="custom-container">
          <div class="text-center">
            <img class="mx-auto mb-4 d-block" src="{{ asset("img/bg-img/verify-otp-image.svg") }}" alt="">
            <h3>Verify Phone Number</h3>
            <p class="mb-4">Enter the 6 digit OTP code sent to <strong>{{ session()->get("number") ?? auth()->user()->number  }}</strong></p>
          </div>
    
          <!-- OTP Verify Form -->
          <div class="mt-4">
            <form action="{{route('verification.number.verify')}}" method="post">
                @csrf
                <x-form.input name="otp" id="otp" placeholder="******" class="w-100 text-center"  />
              <button class="btn btn-theme w-100">Verify &amp; Proceed</button>
            </form>
          </div>
    
          <!-- Term & Privacy Info -->
          <div class="login-meta-data text-center">
            <p class="mt-3 mb-0">Don't received the OTP? <span class="otp-sec" id="resendOTP"></span></p>
          </div>
        </div>
      </div>
</x-layouts.blank>
