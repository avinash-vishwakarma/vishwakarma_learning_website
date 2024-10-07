<x-layouts.app>
    <div class="container">
      <!-- User Information-->
      <div class="card user-info-card mb-3">
        <div class="card-body d-flex align-items-center">
          <div class="user-profile me-3" id="profileImage">
              <div data-bs-toggle="modal" data-bs-target="#fullscreenModal">
                <img src="{{ asset("/img/user_images/".(auth()?->user()?->profile ?? "user_placeholder.svg") ) }}" alt="" >
                <i class="bi bi-pencil"></i>
              </div>



            @slot('cssSlot')
                <link rel="stylesheet" href="{{ asset("css/cropper/cropper.min.css") }}" />
            @endslot
            @slot('jsSlot')
              <script src="{{ asset("js/cropper/cropper.min.js") }}"></script>
              <script src="{{ asset("js/profile.js") }}"></script>
            @endslot
          </div>
          <div class="user-info">
            <div class="d-flex align-items-center">
              <h5 class="mb-1">{{ $user->name }}</h5>
            </div>
          </div>
        </div>
      </div>

      <div class="element-heading">
        <h6> <i class="bi bi-gear-fill"></i> User Details</h6>
      </div>
      <!-- User Meta Data-->
      <div class="card user-data-card mb-2">
        <div class="card-body">
            <x-form.input placeholder="Enter Full Name" label="Full Name" name="name" value="{{ $user->name }}" id="name" readonly />
            <x-form.input placeholder="Number" label="Mobile Number"  value="{{ $user->number }}" id="number" readonly  />
            <x-form.input placeholder="No Email Found" label="Email Address"  value="{{ $user->email }}" id="email" readonly  />
        </div>
      </div>
      <div class="element-heading">
        <h6> <i class="bi bi-gear-fill"></i> Settings</h6>
      </div>
            {{-- <a href="{{ route("profile.edit") }}" class="btn btn-secondary w-100 text-start mb-2"> <i class="bi bi-person-fill-up"></i> Update Profile</a> --}}

            <div class="card">
                <div class="card-body">
                  <a href="{{ route("number_update.show") }}" class="btn btn-theme w-100 text-start mb-2"> <i class="bi bi-telephone-fill" style="padding-right: 5px;"></i> Update Number</a>
                  <a href="{{ route("password_update.show") }}" class="btn btn-theme w-100 text-start mb-2"><i class="bi bi-eye-slash-fill" style="padding-right: 5px;"></i> Update Password</a>
                  <a href="{{ route("email_update.show") }}" class="btn btn-theme w-100 text-start mb-2"> <i class="bi bi-envelope-at" style="padding-right: 5px;"></i> Update Email</a>
                  
                </div>
            </div>

    </div>
    
</x-layouts.app>