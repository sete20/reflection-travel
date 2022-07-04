<x-form.model route="dashboard.coretour.faqlinks" :name="__('Faqlinks')">
    <x-form.input type="number" min="0" max="100000000" name="faq_id" :label="__('Faq Id')"/>
    <x-form.input name="faqlinkable_type" :label="__('Faqlinkable Type')"/>
    <x-form.input type="number" min="0" max="100000000" name="faqlinkable_id" :label="__('Faqlinkable Id')"/>

</x-form.model>
