@props([ 'name','value'=>data_get(Form::getModel(),$name,null), 'label'=>'','wrapperClass'=>null])
@php
    $invalidClass =$errors->has(dotted_string($name)) ? 'is-invalid' : '';
@endphp
<div class="form-group row no-gutters {{$wrapperClass}}" x-data="{imageSrc:{{ $value ? "'$value'" : 'null'}} }">

    <label
        class="col-sm-12 col-form-label text-left {{ $errors->has(dotted_string($name)) ? 'text-danger' : '' }}">
        {{ $label }}
    </label>

    <div class="col-sm-12">

        <div class="custom-image-file" x-on:click="$refs.input.click()">
            <div class="custom-image-file-preview ">

                <template x-if="imageSrc !== null">
                    <img
                        x-bind:src="imageSrc && imageSrc instanceof File ? URL.createObjectURL (imageSrc) : imageSrc"
                        alt=""
                        class="rounded-lg">
                </template>

                <div class="image-file-controller"
                     x-bind:style="imageSrc ? 'background: rgba(0, 0, 0, .25)' : ''"
                >
                    <template x-if="imageSrc !== null">
                        <button
                            x-on:click.stop="imageSrc = null" class="btn btn-icon" type="button">
                            <i class="icon-trash"></i>
                        </button>
                    </template>
                    <template x-if="imageSrc === null">
                        <button style="color: black" class="btn btn-icon" type="button">
                            <i class="icon-image2"></i>
                        </button>
                    </template>
                </div>
            </div>
        </div>


        <input
            style="display: none"
            x-on:change="imageSrc = $event.target.files[0]" type="file"
            class="{{ $invalidClass }} form-control"
            x-ref="input"
            accept="image/*"
            name="{{ $name }}"
        >
        @error(dotted_string($name))
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
