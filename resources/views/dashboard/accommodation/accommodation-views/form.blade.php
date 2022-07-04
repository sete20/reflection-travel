<x-form.model route="dashboard.accommodation.accommodation-views" :name="__('AccommodationViews')">
    <x-form.input type="number" min="0" max="100000000" name="view_id" :label="__('View Id')"/>
    <x-form.input type="number" min="0" max="100000000" name="accommodation_id" :label="__('Accommodation Id')"/>

</x-form.model>
