<x-form.model route="dashboard.day.days" :name="__('Days')">
    <x-form.input name="name" :label="__('Name')"/>
    <x-form.input name="title" :label="__('Title')"/>
    <x-form.select wrapperClass="col-md-12"
                   class="select2"
                   id="citySelectJs"
                   :options="$cities"
                   :selected="$model?->city_id"
                   name="city_id" :label="__('City')"/>
    <x-form.select wrapperClass="col-md-4"
                   class="select2"
                   id="breakfast_id"
                   :options="$breakfasts"
                   :selected="$model?->breakfast_id"
                   name="breakfast_id" :label="__('Breakfast')"/>
    <x-form.select wrapperClass="col-md-4"
                   class="select2"
                   id="lunch_id"
                   :options="$lunch"
                   :selected="$model?->lunch_id"
                   name="lunch_id" :label="__('Lunch')"/>
    <x-form.select wrapperClass="col-md-4"
                   class="select2"
                   id="dinner_id"
                   :options="$dinners"
                   :selected="$model?->dinner_id"
                   name="dinner_id" :label="__('Dinner')"/>

    <x-form.select wrapperClass="col-md-6"
                   class="select2"
                   id="airport_id"
                   :options="$airports"
                   :selected="$model?->airport_id"
                   name="airport_id" :label="__('AirPort')"/>

    <x-form.select multiple
                   wrapperClass="col-md-6"
                   class="select2"
                   id="steps"
                   :options="$steps"
                   :selected="$model?->steps?->pluck('step_id')"
                   name="steps[]" :label="__('Steps')"/>
    <input type="hidden" id="selected_items" value="{{implode(',',$model?->steps?->pluck('step_id')->toArray())}}">
   <x-form.toggle  wrapperClass="col-md-12" name="has_guide" :label="__('Has Guide')"/>


</x-form.model>
