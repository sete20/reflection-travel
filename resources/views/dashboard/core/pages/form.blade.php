<x-form.model route="dashboard.core.pages" :name="__('Pages')">
    <x-locale.input name="title" :label="__('Title')" disabled/>
    <x-locale.input name="body" type="textarea" class="summernote" :label="__('Body')"/>
    <x-form.submit/>
    <x-slot name="styles">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    </x-slot>
    <x-slot name="footer">
        <script
            src="//cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.summernote').summernote();
            });
        </script>
    </x-slot>

</x-form.model>
