<x-form.model route="dashboard.blog.blog-sub-categories" :name="__('BlogCats')">
    <x-form.select wrapperClass="col-md-6"
                   class="select2"
                   :options="$blog_categories"
                   :selected="$model?->parent_category_id"
                   name="parent_category_id" :label="__('Parent Category')"/>
    <x-form.input wrapperClass="col-md-6" name="name" :label="__('Name')"/>
    <x-form.input wrapperClass="col-md-6" name="title" :label="__('Title')"/>
    <x-form.input wrapperClass="col-md-6" name="slug" :label="__('Slug')"/>
    <x-form.input wrapperClass="col-md-12" type="textarea" name="description" :label="__('Description')"/>
    <x-form.image wrapperClass="col-md-12" name="image" :value="$model?->getFirstMediaUrl()" :label="__('image')"/>

    <x-form.input name="meta_title" :label="__('Meta Title')"/>
    <x-form.input name="meta_keywords" :label="__('Meta Keywords')"/>
    <x-form.input type="textarea" name="meta_description" :label="__('Meta Description')"/>
</x-form.model>
