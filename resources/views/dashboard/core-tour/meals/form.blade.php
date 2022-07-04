<x-form.model route="dashboard.core-tour.meals" :name="__('Meals')">

    <x-form.input name="name" :label="__('Include name')"/>
    <x-form.input name="title" :label="__('Include title')"/>
    @if(!isset($model))
        <x-form.select
            class="select2"
            :options="$cities"
            :selected="$model?->city_id"
            name="city_id"
            :label="__('City')"/>
    @else
        <input type="hidden" value="{{$model?->city_id}}" name="city_id">
    @endif
    <x-form.select name="class" :label="__('Choose Meal')"
                   :options="['breakfast'=>__('breakfast'), 'lunch'=>__('lunch'), 'dinner'=>__('dinner')]"
                   :selected="$model?->class"
    />
    <x-form.select name="type" :label="__('Choose type')"
                   :options="['free'=>__('Free'), 'per_tour'=>__('per tour'), 'per_pax'=>__('per pax')]"
                   :selected="$model?->type"
    />
    @if(isset($model->type))
        @if(old('type'))
            <div id="fee" class="row {{ (old('type') != 'per_tour')?'d-none':'' }}">
                <div class="col-md-6">
                    <x-form.input name="fee" :label="__('Fee')"/>
                </div>
            </div>
            <div id="fees" class="row {{ (old('type') != 'per_pax')?'d-none':'' }}">
                <div class="col-md-6">
                    <h5>{{ __('Fees') }}</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <x-form.input name="adult_fee" :label="__('Adult fee')"/>
                        </div>
                        <div class="col-md-4">
                            <x-form.input name="child_fee" :label="__('Child fee')"/>
                        </div>
                        <div class="col-md-4">
                            <x-form.input name="infant_fee" :label="__('Infant fee')"/>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div id="fee" class="row {{ ($model->type != 'per_tour')?'d-none':'' }}">
                <div class="col-md-6">
                    <x-form.input name="fee" :label="__('Fee')"/>
                </div>
            </div>
            <div id="fees" class="row {{ ($model->type != 'per_pax')?'d-none':'' }}">
                <div class="col-md-6">
                    <h5>{{ __('Fees') }}</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <x-form.input name="adult_fee" :label="__('Adult fee')"/>
                        </div>
                        <div class="col-md-4">
                            <x-form.input name="child_fee" :label="__('Child fee')" />
                        </div>
                        <div class="col-md-4">
                            <x-form.input name="infant_fee" :label="__('Infant fee')"/>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    @else
        <div id="fee" class="col-md-12 {{ (old('type') != 'per_tour')?'d-none':'' }}">
            <div>
                <x-form.input name="fee" :label="__('Fee')"/>
            </div>
        </div>
        <div id="fees" class="col-md-12 {{ (old('type') != 'per_pax')?'d-none':'' }}">
            <div>
                <h5>{{ __('Fees') }}</h5>
                <div class="row">
                    <div class="col-md-4">
                        <x-form.input name="adult_fee" :label="__('Adult fee')"/>
                    </div>
                    <div class="col-md-4">
                        <x-form.input name="child_fee" :label="__('Child fee')"/>
                    </div>
                    <div class="col-md-4">
                        <x-form.input name="infant_fee" :label="__('Infant fee')" />
                    </div>
                </div>
            </div>
        </div>
    @endif

    <x-slot name="footer">
        <script>
            $(function(){
                $('[name=type]').change(function(){
                    if($(this).val() == 'free'){
                        $('#fee').addClass('d-none');
                        $('#fees').addClass('d-none');
                    }else if($(this).val() == 'per_tour'){
                        $('#fee').removeClass('d-none');
                        $('#fees').addClass('d-none');
                    }else if($(this).val() == 'per_pax'){
                        $('#fee').addClass('d-none');
                        $('#fees').removeClass('d-none');
                    }
                    return false;
                });
            });
        </script>
    </x-slot>

</x-form.model>
