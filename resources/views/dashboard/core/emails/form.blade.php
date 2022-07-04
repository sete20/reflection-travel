<x-form.model route="dashboard.core.emails" :name="__('Emails')">
    <x-form.input name="email" :label="__('Email')"/>
    <x-form.input name="emailable_type" :label="__('Emailable Type')"/>
    <x-form.input type="number" min="0" max="100000000" name="emailable_id" :label="__('Emailable Id')"/>

</x-form.model>
