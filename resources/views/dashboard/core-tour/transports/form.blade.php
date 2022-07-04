<x-form.model route="dashboard.core-tour.transports" :name="__('Transports')">
    <x-form.input  wrapperClass="col-md-6" name="name" :label="__('Name')"/>
    <x-form.input  wrapperClass="col-md-6" name="title" :label="__('Title')"/>
    <x-form.input  wrapperClass="col-md-6" name="body" :label="__('Body')"/>
    <x-form.input  wrapperClass="col-md-6" type="number" min="0" max="100000000" name="limousine_price" :label="__('Limousine Price')"/>
    <x-form.input  wrapperClass="col-md-6" type="number" min="0" max="100000000" name="hiace_price" :label="__('Hiace Price')"/>
    <x-form.input wrapperClass="col-md-6" type="number" min="0" max="100000000" name="coaster_price" :label="__('Coaster Price')"/>
    <x-form.input  wrapperClass="col-md-6" type="number" min="0" max="100000000" name="coach_price" :label="__('Coach Price')"/>
    <x-form.select wrapperClass="col-md-6" class="select2" :options="$cities" :selected="$model?->city_id" name="city_id" :label="__('City')"/>

</x-form.model>
