@if (Session::has("toast"))
    @php
       $toastmessage = Session::get("toast");
@endphp
        <!-- Welcome Toast -->
        <div
        class="toast toast-autohide custom-toast-1 toast-{{ $toastmessage['type'] }} home-page-toast"
        role="alert"
        aria-live="assertive"
        aria-atomic="true"
        data-bs-delay="7000"
        data-bs-autohide="true"
      >
        <div class="toast-body">
          <i class="bi bi-bookmark-check text-white h1 mb-0"></i>
          <div class="toast-text ms-3 me-2">
            <p class="mb-1 text-white">{{ $toastmessage["title"] }}</p>
            <small class="d-block">
            {{ $toastmessage["description"] }}  
            </small>
          </div>
        </div>
        <button
          class="btn btn-close btn-close-white position-absolute p-1"
          type="button"
          data-bs-dismiss="toast"
          aria-label="Close"
        ></button>
      </div>
@endif