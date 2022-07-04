@props([
'name',
'options'=>[],
'label'=>'',
'id'=>'',
'class' => "",
'selected'=>null,
'selectedId'=>1,
'columnName'=>null,
'displayColumnName'=>null,
'whereColumnName'=>null,
'whereColumnId'=>null,
'selectedRelationName'=>null,
'selectedRelationClass'=>null,
'multiple'=>null,
'modelId'=>null,
'wrapperClass'=>null,
'modelClass'=>'',
'currentClass'=>''
])
<div class="form-group row no-gutters {{$class}} {{$wrapperClass}}">
    <label
        class="col-sm-12 col-form-label text-left  {{ $errors->has(dotted_string($name)) ? 'text-danger' : '' }}">
        {{ $label }}
    </label>
    @php

        $splitAttributes = explode(' ',$attributes);
        $invalidClass =$errors->has(dotted_string($name)) ? 'is-invalid' : '';
        $defaultPlaceHolder = !$multiple ? __('Select') .' '. __(':name',['name'=>$label]) : null;

       $properties = [
         'class'=>"dashboard-form-select-ajax {$invalidClass} form-control" ,
         'id'=>"{$id}" ,
         'placeholder'=> $defaultPlaceHolder,
         ...$splitAttributes,
         'multiple'=>$multiple,
         'data-model-class'=>$modelClass,
         'data-current-class'=>$currentClass,
         'data-column-name'=>$columnName,
         'data-display-column-name'=>$displayColumnName,
         'data-where-column-name'=>$whereColumnName,
         'data-where-column-id'=>$whereColumnId,
         'data-selected-id'=> $selectedId,
         'data-is-multi-relation'=> ( $multiple && $selectedRelationName !== null) ? 1 : 0 ,
         'data-selected-relation-name'=> ($multiple) ? $selectedRelationName : null,
         'data-selected-relation-class'=> ($multiple) ? $selectedRelationClass : null,
         'data-route'=> route('dashboard.core.select-model-ajax',['modelClass'=>$modelClass]),
         'data-selected-route'=> $selectedId !== null ? route('dashboard.core.selected-model-ajax',['modelClass'=>$modelClass,'id'=>$selectedId,'columnName'=>$columnName]) : '',
         'data-selected-relation-route'=> ($multiple) ? route('dashboard.core.selected-multi-model-ajax',['modelClass'=>$modelClass,'model_id'=>$modelId,'currentClass'=>$currentClass]) : '',
        ];
    @endphp
    <div class="col-sm-12">
        {!! !$slot->isEmpty() ?  $slot : Form::select($name,$options,$selected,$properties) !!}
        @error(dotted_string($name))
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>


