<x-form.model route="dashboard.core-tour.permits" :name="__('Permits')">
    <x-form.input name="name" :label="__('Permit name')"/>
    <x-form.input name="title" :label="__('Permit title')"/>
    <x-form.input type="number" name="limousine_price" :label="__('Limousine price')"/>
    <x-form.input type="number" name="hiace_price" :label="__('Hiace price')"/>
    <x-form.input type="number" name="coaster_price" :label="__('Coaster price')"/>
    <x-form.input type="number" name="coach_price" :label="__('Coach (bus) price')"/>
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
