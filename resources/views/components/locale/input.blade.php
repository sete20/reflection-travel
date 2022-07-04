@props(['name','label'])
<div class="row">
    <div class="col-12 col-md-6">
        <x-form.input :name="$name.'[ar]'"
                      {{ $attributes }} :label="__ (':label Ar',['label'=>$label])"
                      :value="locale_field($name)" {{$attributes}} />
    </div>
    <div class="col-12 col-md-6">
        <x-form.input :name="$name.'[en]'"
                      {{ $attributes }} :label="__ (':label En',['label'=>$label])"
                      :value="locale_field($name,'en')" {{$attributes}}/>
    </div>
</div>
