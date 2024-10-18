<x-layouts.app header="Update Email">

    <div class="page-content-wrapper py-3">
        <div class="container ">

            <div class="affan-element-item">
                <div class="element-heading-wrapper">
                    <i class="bi bi-envelope bg-theme"></i>
                  <div class="heading-text">
                    <h6 class="mb-1">Email Setting</h6>
                    <span>Add or Update your email.</span>
                  </div>
                </div>
              </div>

              <x-form.validation-alert/>

            <div  class="card">
                <div class="card-body">
                    <x-form.input id="userEmail"  label="Your Current Email" placeholder="Your Current Email" :value="auth()->user()->email ?? 'Kindly add new Email'" readonly/>      
                </div>
            </div>

            <div class="element-heading my-2">
                <h6>Add new email</h6>
            </div>

            <div  class="card">
                <div class="card-body">
                    <form action="{{ route("email_update.update") }}" method="POST">
                        @csrf
                        @method("PATCH")                       
                        <x-form.input name="email" id="userEmail"  label="Enter Email" placeholder="Enter Email"  />      
                        <button class="btn btn-theme w-100">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </div>


</x-layouts.app>