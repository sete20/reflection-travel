<x-form.model route="dashboard.blog.blog-sections" :name="__('BlogSections')">
    <x-form.input name="name" :label="__('Name')"/>
    <x-form.input name="title" :label="__('Title')"/>
    <x-form.input name="slug" :label="__('Slug')"/>
    <x-form.input type="textarea" class="summernote" name="description" :label="__('Description')"/>
    <x-form.input name="meta_title" :label="__('Meta Title')"/>
    <x-form.input name="meta_keywords" :label="__('Meta Keywords')"/>
    <x-form.input name="meta_description" :label="__('Meta Description')"/>

</x-form.model>
