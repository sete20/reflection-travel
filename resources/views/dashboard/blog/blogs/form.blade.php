<x-form.model route="dashboard.blog.blogs" :name="__('Blogs')" :parameters="['section_id'=>request('section_id')]">
    <x-form.select wrapperClass="col-md-12"
                   class="select2"
                   :options="$categories"
                   :selected="$model?->blog_cat_id"
                   name="blog_cat_id" :label="__('Category')"/>
    <x-form.input wrapperClass="col-md-4" name="name" :label="__('Name')"/>
    <x-form.input wrapperClass="col-md-4" name="title" :label="__('Title')"/>
    <x-form.input wrapperClass="col-md-4" name="slug" :label="__('Slug')"/>
    <x-form.input wrapperClass="col-md-12" type="textarea" name="description" :label="__('Description')"/>
    <x-form.input wrapperClass="col-md-12" class="summernote" name="body" :label="__('Body')"/>
    <x-form.select wrapperClass="col-md-12"
                   class="select2"
                   :options="$blogs"
                   :selected="$model?->parent_id"
                   name="parent_id" :label="__('Parent')"/>
    <x-form.input wrapperClass="col-md-6" name="meta_title" :label="__('Meta Title')"/>
    <x-form.input wrapperClass="col-md-6" name="meta_keywords" :label="__('Meta Keywords')"/>
    <x-form.input  wrapperClass="col-md-12" type="textarea" name="meta_description" :label="__('Meta Description')"/>

</x-form.model>
