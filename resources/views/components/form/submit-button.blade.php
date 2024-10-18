@props(['text'])

<button class="btn btn-theme w-100" type="submit">
    <div class="spinner-border spinner-border-sm text-light d-none" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
    {{ $text }}
  </button>