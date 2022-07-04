<x-form.model route="dashboard.accommodation.views" :name="__('Views')">
    <x-form.select :options="['hotel'=>__('hotel'),'cruise'=>__('cruise')]" name="type" :label="__('Type')"/>
    <x-form.input name="name" :label="__('Name')"/>
</x-form.model>
