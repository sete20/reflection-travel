<x-form.model route="dashboard.blog.blog-cats" :name="__('BlogCats')">
    <x-form.select wrapperClass="col-md-6"
                   class="select2"
                   :options="$sections"
                   :selected="$model?->blog_section_id"
                   name="blog_section_id" :label="__('Section')"/>
    <x-form.input wrapperClass="col-md-6" name="name" :label="__('Name')"/>
    <x-form.input wrapperClass="col-md-6" name="title" :label="__('Title')"/>
    <x-form.input wrapperClass="col-md-6" name="slug" :label="__('Slug')"/>
    <x-form.input wrapperClass="col-md-12" type="textarea" name="description" :label="__('Description')"/>
    <x-form.image wrapperClass="col-md-12" name="image" :value="$model?->getFirstMediaUrl()" :label="__('image')"/>

    <x-form.input name="meta_title" :label="__('Meta Title')"/>
    <x-form.input name="meta_keywords" :label="__('Meta Keywords')"/>
    <x-form.input type="textarea" name="meta_description" :label="__('Meta Description')"/>
    <x-form.select multiple
                   wrapperClass="col-md-9"
                   class="select2"
                   :options="$faqs"
                   :selected="$model?->faqs?->pluck('faq_id')"
                   name="faqs[]" :label="__('Faqs')"/>
    <div class="col-md-3">
        <label class="col-form-label text-left"></label>
        <div>
            <a class="btn btn-primary mt-2" href="{{ route('dashboard.core-tour.faqs.create') }}" target="_blank">{{ __('Create new FAQ') }}</a>
        </div>
    </div>
    <x-form.select multiple
                   wrapperClass="col-md-9"
                   class="select2"
                   :options="$highlights"
                   :selected="$model?->highlights?->pluck('highlight_id')"
                   name="highlights[]" :label="__('Highlights')"/>
    <div class="col-md-3">
        <label class="col-form-label text-left"></label>
        <div>
            <a class="btn btn-primary mt-2" href="{{ route('dashboard.core-tour.highlights.create') }}" target="_blank">{{ __('Create new Highlight') }}</a>
        </div>
    </div>
    <x-form.select multiple
                   wrapperClass="col-md-9"
                   class="select2"
                   :options="$tips"
                   :selected="$model?->tips?->pluck('tip_id')"
                   name="tips[]" :label="__('Tips')"/>
    <div class="col-md-3">
        <label class="col-form-label text-left"></label>
        <div>
            <a class="btn btn-primary mt-2" href="{{ route('dashboard.core-tour.tips.create') }}" target="_blank">{{ __('Create new Tip') }}</a>
        </div>
    </div>


</x-form.model>
