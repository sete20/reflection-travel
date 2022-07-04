<x-form.model route="dashboard.core-tour.excludes" :name="__('Excludes')">
    <x-form.input name="name" :label="__('Name')"/>
    <x-form.input name="title" :label="__('Title')"/>
    @if(!isset($model))
        <x-form.select wrapperClass="col-md-6"
                       class="select2"
                       :options="$cities"
                       :selected="$model?->city_id"
                       name="city_id"
                       :label="__('City')"/>
    @else
        <input type="hidden" value="{{$model?->city_id}}" name="city_id">
    @endif

</x-form.model>
