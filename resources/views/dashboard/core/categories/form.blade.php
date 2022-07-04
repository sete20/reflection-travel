<x-form.model route="dashboard.core.categories" :name="__('Categories')">
    <x-form.image name="image" :value="$model?->getFirstMediaUrl()" :label="__('Image')"/>
    <x-form.input name="name" :label="__('Name')"/>
</x-form.model>
