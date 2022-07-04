@props(['name','options'=>[],'label'=>'','class' => "",'selected'=>null,'multiple'=>null ,'wrapperClass'=>''])
<div class="col-sm-12 {{$wrapperClass}}">
    <label
        class="col-form-label text-left {{ $errors->has(dotted_string($name)) ? 'text-danger' : '' }}">
        {{ $label }}
    </label>
    @php
        $splitAttributes = explode(' ',$attributes);
        $invalidClass =$errors->has(dotted_string($name)) ? 'is-invalid' : '';
        $defaultPlaceHolder = !$multiple ? __('Select :name',['name'=>$label]) : null;

       $properties = [
         'class'=>"{$invalidClass} form-control {$class}" ,
         'placeholder'=> $defaultPlaceHolder,
         ...$splitAttributes,
         'multiple'=>$multiple
        ];
    @endphp
    <div class="">
        {!! !$slot->isEmpty() ?  $slot : Form::select($name,$options,$selected,$properties) !!}
        @error(dotted_string($name))
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
