<x-form.model route="dashboard.accommodation.accommodation-prices" :name="__('AccommodationPrices')">
    <x-form.input type="number" name="single" :label="__('Single')"/>
    <x-form.input type="number" name="double" :label="__('Double')"/>
    <x-form.input type="number" name="trible" :label="__('Trible')"/>
    <input type="hidden" name="accommodation_id" value="{{request('accommodation_id')}}">
</x-form.model>
