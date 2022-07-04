<x-pages.crud
    :name="__('Blogs')"
    route="dashboard.blog.blogs"
    :datatable="$dataTable"
    :parameters="['section_id'=>request('section_id')]"
/>
