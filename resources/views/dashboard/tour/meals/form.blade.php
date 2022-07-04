<x-form.model route="dashboard.tour.meals" :name="__('Meals')">
    <x-form.input name="name" :label="__('Name')"/>
    <x-form.input type="number" min="0" max="100000000" name="day_id" :label="__('Day Id')"/>

</x-form.model>
