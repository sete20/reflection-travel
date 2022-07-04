<x-form.model route="dashboard.core-tour.airports" :name="__('Airports')">

    <x-form.input  wrapperClass="col-md-6" name="name" :label="__('Name')"/>
    <x-form.input  wrapperClass="col-md-6" name="title" :label="__('Title')"/>
    <x-form.input  wrapperClass="col-md-6" type="time"  name="take_off_hour" :label="__('Take Off Hour')"/>
    <x-form.input  wrapperClass="col-md-6" type="time"  name="arrival_time" :label="__('Arrival Time')"/>
    <x-form.input  wrapperClass="col-md-6" type="number" min="0" max="100000000" name="child_price" :label="__('Child Price')"/>
    <x-form.input  wrapperClass="col-md-6" type="number" min="0" max="100000000" name="adult_price" :label="__('Adult Price')"/>
    <x-form.input  wrapperClass="col-md-6" type="number" min="0" max="100000000" name="infant_price" :label="__('infant Price')"/>

    <x-form.select wrapperClass="col-md-6"
                   class="select2"
                   :options="$cities"
                   :selected="$model?->pickup_city_id"
                   name="pickup_city_id"
                   :label="__('Pickup City')"/>

    <x-form.select wrapperClass="col-md-6"
                   class="select2"
                   :options="$cities"
                   :selected="$model?->drop_off_city_id"
                   name="drop_off_city_id"
                   :label="__('Drop Off City')"/>
</x-form.model>
