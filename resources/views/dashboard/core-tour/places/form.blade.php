<x-form.model route="dashboard.core-tour.places" :name="__('Places')">
    <x-form.input wrapperClass="col-md-6" name="name" :label="__('Name')"/>
    <x-form.input wrapperClass="col-md-6" name="title" :label="__('Title')"/>

    <div class="container">
        <div class="col-sm-12">
            <h5>{{ __('Adult fees') }}</h5>
            <div class="row">
                <div class="col-md-4">
                    <x-form.input type="number" name="adult_fee" :label="__('Foreign')" :placeholder="__('e.g. 600')"/>
                </div>
                <div class="col-md-4">
                    <x-form.input type="number" name="arab_adult_fee" :label="__('Arab')" :placeholder="__('e.g. 600')"/>
                </div>
                <div class="col-md-4">
                    <x-form.input type="number" name="egyptian_adult_fee" :label="__('Egyptian')" :placeholder="__('e.g. 600')"/>
                </div>
            </div>

             <h5>{{ __('Child fees') }}</h5>
            <div class="row">
                <div class="col-md-4">
                    <x-form.input type="number" name="child_fee" :label="__('Foreign')" :placeholder="__('e.g. 600')" />
                </div>
                <div class="col-md-4">
                    <x-form.input type="number" name="arab_child_fee" :label="__('Arab')" :placeholder="__('e.g. 600')"/>
                </div>
                <div class="col-md-4">
                    <x-form.input type="number" name="egyptian_child_fee" :label="__('Egyptian')" :placeholder="__('e.g. 600')"/>
                </div>
            </div>
            <h5>{{ __('Infant fees') }}</h5>
            <div class="row">
                <div class="col-md-4">
                    <x-form.input type="number" name="infant_fee" :label="__('Foreign')" :placeholder="__('e.g. 600')"/>
                </div>
                <div class="col-md-4">
                    <x-form.input type="number" name="arab_infant_fee" :label="__('Arab')" :placeholder="__('e.g. 600')"/>
                </div>
                <div class="col-md-4">
                    <x-form.input type="number" name="egyptian_infant_fee" :label="__('Egyptian')" :placeholder="__('e.g. 600')"/>
                </div>
            </div>
        </div>
    </div>
    <x-form.input wrapperClass="col-md-6" name="latitude" :label="__('Latitude')"/>
    <x-form.input wrapperClass="col-md-6" name="longitude" :label="__('Longitude')"/>
    <x-form.select wrapperClass="col-md-6" class="select2" :options="$cities" :selected="$model?->city_id" name="city_id" :label="__('City')"/>
    <x-form.select wrapperClass="col-md-6" class="select2" :options="$blogs" :selected="$model?->blog_id" name="blog_id" :label="__('Blog')"/>


</x-form.model>
