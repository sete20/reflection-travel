<x-form.model route="dashboard.core-tour.highlightlinks" :name="__('Highlightlinks')">
    <x-form.input type="number" min="0" max="100000000" name="highlight_id" :label="__('Highlight Id')"/>
    <x-form.input name="highlightlinkable_type" :label="__('Highlightlinkable Type')"/>
    <x-form.input type="number" min="0" max="100000000" name="highlightlinkable_id" :label="__('Highlightlinkable Id')"/>

</x-form.model>
