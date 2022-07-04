<x-form.model route="dashboard.tour.benfits" :name="__('Benfits')">
    <x-form.input name="title" :label="__('Title')"/>
    <x-form.image name="image" :value="$model?->getFirstMediaUrl()" :label="__('Image')"/>
    <x-form.input type="textarea" name="subtitle" :label="__('Subtitle')"/>
</x-form.model>
