<x-form.model route="dashboard.itinerary.itinerary-weeks" :name="__('ItineraryWeeks')">
    <x-form.input name="week" :label="__('Week')"/>
    <x-form.input type="number" min="0" max="100000000" name="itinerary_id" :label="__('Itinerary Id')"/>

</x-form.model>
