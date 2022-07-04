<x-form.model route="dashboard.user.phones" :name="__('Phones')">
    <x-form.input name="phone" :label="__('Phone')"/>
    <x-form.input name="phoneable_type" :label="__('Phoneable Type')"/>
    <x-form.input type="number" min="0" max="100000000" name="phoneable_id" :label="__('Phoneable Id')"/>

</x-form.model>
