<x-form.model route="dashboard.core.cities" :name="__('Cities')">
    <x-form.input name="name" :label="__('Name')"/>
    @foreach(langs() as $lang)
        <x-form.input type="number" min="0"
                      name="tourguide_fee[{{$lang}}]"
                      :label="__('Tourguide Fee '.$lang)"
                      :value="$model?->tourguide_fee[$lang] ?? 0"/>
    @endforeach
</x-form.model>
