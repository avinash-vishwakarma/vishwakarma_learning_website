@props(['placeholder'=>"Enter Password","name"=>"password","label"=>null , "value"=>null])

@if ($label)
<label class="mb-2"> {{ $label }} </label>
@endif
<div class="form-group position-relative">
    <input class="form-control @error($name) border-danger  @enderror "  type="password" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value ?? old($name) }}">
    <div class="position-absolute showPassword " id="password-visibility">
      <i class="bi bi-eye"></i>
      <i class="bi bi-eye-slash"></i>
    </div>
</div>