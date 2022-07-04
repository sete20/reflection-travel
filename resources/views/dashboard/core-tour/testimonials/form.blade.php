<x-form.model route="dashboard.core-tour.testimonials" :name="__('Testimonials')">
    
    <x-form.input name="client_name" :label="__('Client Name')"/>
    <x-form.input type="textarea" name="client_review" :label="__('Client Review')"/>
    <x-form.input type="date" name="date" :label="__('Date')"/>
</x-form.model>
