@props(["type"=>"text","id","placeholder","name"=>null,"class"=>"","label"=>null,"value"=>null,"readonly"=>false])
<div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">+91</span>
    <input class="form-control @error($name) border-danger  @enderror {{ $class }}" type="{{ $type }}" id="{{ $id }}" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value ? ($value) : (old($name) ? old($name) : "") }}" {{ $readonly ? "readonly" : "" }}>
</div>