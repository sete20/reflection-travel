<x-form.model route="dashboard.core-tour.attendants" :name="__('Attendants')">
    <x-form.input name="name" :label="__('Name')"/>
    <x-form.input name="title" :label="__('Title')"/>
    <x-form.input type="number" name="fee" :label="__('Fee')"/>
    @if(!isset($model))
        <x-form.select
            wrapperClass="col-md-6"
            class="select2"
            :options="$cities"
            :selected="$model?->city_id"
            name="city_id"
            :label="__('City')"/>
    @endif

</x-form.model>
