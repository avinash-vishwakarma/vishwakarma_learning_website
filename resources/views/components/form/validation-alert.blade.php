@if ($errors->any())
<div class="alert custom-alert-2 alert-danger alert-dismissible fade show" role="alert">
    <i class="bi bi-x-circle"></i>
    {{ $errors->first() }}
    <button class="btn btn-close btn-close-white position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif