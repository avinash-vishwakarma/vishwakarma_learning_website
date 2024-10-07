@props(['name',"options"=>[] , "selected"=>null,"label"=>null,"id"])

<div class="form-group">

    @if ($label)
    <label class="form-label" for="{{ $id }}">{{ $label }}</label>
    @endif

    <select class="form-select form-control-clicked" name="{{ $name }}" id="{{ $id }}">
        <option value="null" {{ $selected ? "" : "selected" }}>Select Option</option>
        @foreach ($options as $option)
        <option value="{{ $option->slug }}" {{ $selected == $option->slug ? "selected" : "" }}>{{ $option->name }} ( {{ $option->short_form}} )</option>          
        @endforeach    
    </select>
</div>