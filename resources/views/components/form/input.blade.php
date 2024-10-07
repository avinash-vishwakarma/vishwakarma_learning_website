@props(["type"=>"text","id","placeholder","name"=>null,"class"=>"","label"=>null,"value"=>null,"readonly"=>false])

<div class="form-group">
    @if ($label)
    <label class="form-label" for="{{ $id }}">{{ $label }}</label>
    @endif
    <input class="form-control @error($name) border-danger  @enderror {{ $class }}" type="{{ $type }}" id="{{ $id }}" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value ? ($value) : (old($name) ? old($name) : "") }}" {{ $readonly ? "readonly" : "" }}>
</div>