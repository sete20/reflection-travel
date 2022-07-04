<x-form.model route="dashboard.tour.tours" :name="__('Tours')">
    <x-form.input wrapperClass="col-md-6" name="name" :label="__('Name')"/>
    <x-form.input wrapperClass="col-md-6" name="title" :label="__('Title')"/>
    <x-form.input wrapperClass="col-md-12"
                  type="textarea"
                  name="description" :label="__('Description')"/>
    <x-form.input wrapperClass="col-md-12"
                  type="textarea"
                  class="summernote"
                  name="interesting" :label="__('Interesting')"/>
    <x-form.select wrapperClass="col-md-12"
                   class="select2"
                   :options="$itineraries"
                   :selected="$model?->itinerary_id"
                   name="itinerary_id" :label="__('Itinerary')"/>
    <div class="col-md-12">
        <a class="btn btn-primary mt-2" target="_blank" href="{{route('dashboard.itinerary.itineraries.create')}}">New Itinerary</a>
    </div>
    <x-form.select wrapperClass="col-md-6"
                   class="select2"
                   :options="$categories"
                   :selected="$model?->category_id"
                   name="category_id" :label="__('Category')"/>

    <x-form.select wrapperClass="col-md-12" multiple
                   class="select2"
                   :options="$faqs"
                   :selected="$model?->faqs"
                   name="faqs[]" :label="__('Faqs')"/>

    <x-form.select wrapperClass="col-md-12" multiple
                   class="select2"
                   :options="$accommodations"
                   :selected="$model?->accommodations"
                   name="accommodations[]" :label="__('Accommodations')"/>

    <x-form.select wrapperClass="col-md-6"
                   class="select2"
                   :options="$cities"
                   :selected="$model?->start_from_id"
                   name="start_from_id" :label="__('Start From')"/>
    <x-form.select wrapperClass="col-md-6"
                   class="select2"
                   :options="$cities"
                   :selected="$model?->start_to_id"
                   name="start_to_id" :label="__('End At')"/>

</x-form.model>
