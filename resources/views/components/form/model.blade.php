@props(['model','route','name','id','parameters'=>[],'classAjax'=>null])
@extends('dashboard.layouts.default')
@php($routesList = is_array($route) ? $route : null)
@php($model = Form::getModel())
@if($model)
    @section('title',__("Edit :name",['name'=>$name]))
@else
    @section('title',__('Create :name',['name'=>$name]))
@endif
@push('styles')
    {{ $styles ?? '' }}
@endpush
@section('actions')
    <button form="crud-modal-form" type="submit" class="btn btn-success mx-2 px-5">
        {{ __('Save Data') }}
    </button>
    <a href="#" id="back-button" class="btn btn-secondary">
    <!-- {{ __('Go Back') }} -->
        <i class="icon-arrow-left7"></i>
    </a>
@endsection
@section('content')
    <div class="card">
        <div class="col-span-12">
            <div id="{{ $id ?? $name.'-form' }}" class=" card-body ">
                @if($model)
                    {!! Form::model(
                    $model,
                        [
                            'id'=>'crud-modal-form',
                            'class'=>$classAjax,
                            'route' => $routesList['update'] ?? [$route.'.update', $model->{$model->getKeyName()}],
                            'method'=>'PUT','files'=>true
                        ]
                     )!!}
                @else
                    {!! Form::open([ 'class'=>$classAjax,
                                    'id'=>'crud-modal-form','route' => $routesList['create']?? $route.'.store',
                    'files'=>true])!!}
                @endif
                <div class="row">
                    {{ $slot }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script
        src="{{ asset('admin/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script>

        $(document).ready(function () {

            let select2Var = $('.select2');
            select2Var.select2({
                tags: true,
                maximumSelectionLength: 50
            });

           /*
            select2Var.on("select2:select", function (evt) {
                let element = evt.params.data.element;
                let $element = $(element);

                $element.detach();
                $(this).append($element);
                $(this).trigger("change");
            });
            */


            displayed_items = $('#selected_items').val().split(',');

            function selectItem(target, id) { // refactored this a bit, don't pay attention to this being a function
                var option = $(target).children('[value='+id+']');
                option.detach();
                $(target).append(option).change();
            }

            function customPreSelect() {
                let items = $('#selected_items').val().split(',');
                $("#steps").val('').change();
                initSelect(items);
            }

            function initSelect(items) { // pre-select items
                items.forEach(item => { // iterate through array of items that need to be pre-selected
                    let value = $('#steps option[value='+item+']').text(); // get items inner text
                    $('#steps option[value='+item+']').remove(); // remove current item from DOM
                    $('#steps').append(new Option(value, item, true, true)); // append it, making it selected by default
                });
            }

            $('#steps').select2();
            $('#steps').on('select2:select', function(e){
                selectItem(e.target, e.params.data.id);
            });

            initSelect(displayed_items); // call init

        });

        $('#back-button').on('click', function (e) {
            e.preventDefault();
            window.history.back();
        });
    </script>
    <script src="{{asset('admin/assets/js/form/select-ajax.js')}}"></script>
    {{ $footer ?? '' }}
@endpush
