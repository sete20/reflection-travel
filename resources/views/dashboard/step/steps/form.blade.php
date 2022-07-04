<x-form.model route="dashboard.step.steps" :name="__('Steps')">

    <x-form.input wrapperClass="col-md-6" name="name" :label="__('Name')"/>
    <x-form.input wrapperClass="col-md-6" name="title" :label="__('Title')"/>
    <x-form.input type="textarea" wrapperClass="col-md-12" name="body" :label="__('Body')"/>

    <x-form.input wrapperClass="col-md-6"
                  name="duration" :label="__('Duration')"/>
    <x-form.select wrapperClass="col-md-6"
                   name="duration_type"
                   :label="__('Duration type')"
                   :options="['m'=>__('Min'),'h'=>__('hour')]"
                   :selected="$model?->duration_type"
    />
    <x-form.toggle wrapperClass="col-md-12"
                   name="duration_approximate" :label="__('Approximate')"/>

    <x-form.select wrapperClass="col-md-6"
                   class="select2"
                   :options="$places"
                   :selected="$model?->place_id"
                   name="place_id" :label="__('Place')"/>
    <x-form.select wrapperClass="col-md-6"
                   class="select2"
                   :options="$transports"
                   :selected="$model?->transport_id"
                   name="transport_id" :label="__('Transport')"/>

    <x-form.select wrapperClass="col-md-6"
                   class="select2"
                   :options="$airports"
                   :selected="$model?->airport_id"
                   name="airport_id" :label="__('AirPort')"/>
    <x-form.select wrapperClass="col-md-6"
                   class="select2"
                   :options="$attendants"
                   :selected="$model?->attendant_id"
                   name="attendant_id" :label="__('Attendant')"/>
    <x-form.select wrapperClass="col-md-6"
                   class="select2"
                   :options="$permits"
                   :selected="$model?->permit_id"
                   name="permit_id" :label="__('Permit')"/>
    <x-form.select wrapperClass="col-md-12"
                   class="select2"
                   id="citySelectJs"
                   :options="$cities"
                   :selected="$model?->city_id"
                   name="city_id" :label="__('City')"/>

    <x-form.select multiple wrapperClass="col-md-6"
                   id="includesJs"
                   name="includes[]"
                   :label="__('Includes')"/>

    <x-form.select multiple wrapperClass="col-md-6"
                   id="excludesJs"
                   name="excludes[]"
                   :label="__('Excludes')"/>
    <x-slot name="footer">
        @include('dashboard.step.steps.script-includes');
        @include('dashboard.step.steps.script-excludes');
    </x-slot>
</x-form.model>
