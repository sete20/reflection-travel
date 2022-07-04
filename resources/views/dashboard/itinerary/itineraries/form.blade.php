<x-form.model route="dashboard.itinerary.itineraries" :name="__('Itineraries')">
    <x-form.input name="name" :label="__('Name')"/>
    <x-form.select-ajax multiple
                   wrapperClass="col-md-12"
                   id="days"
                   name="days[]" :label="__('Days')"/>

    <x-form.select multiple
                        wrapperClass="col-md-12"
                        id="weekDays"
                        :options="$weekDays"
                        class="select2"
                        :selected="$model?->weekDays()->pluck('week')"
                        name="weekDays[]" :label="__('Allowed Week')"/>


    <x-slot name="footer">
    <script>
        function selectDays(model){
            model.select2({
                ajax: {
                    url: '{{route('dashboard.core.selected-multi-model-ajax')}}',
                    dataType: 'json',
                    delay: 250,
                    type: 'post',
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page,
                            _token: "{{ csrf_token() }}",
                            relationName: 'days',
                            columnName: 'name',
                            model_id: '{{$model?->id}}',
                            modelClass: 'App\\Domain\\Day\\Models\\Day',
                            currentClass: "App\\Domain\\Itinerary\\Models\\Itinerary",
                        };
                    },
                    processResults: function (data, params) {

                        params.page = params.page || 1;
                        return {
                            results: data.data.data,
                            pagination: {
                                more: params.page < data.data.last_page
                            }
                        };
                    },
                    cache: false
                },
            });
        }
        $(document).ready(function () {
            let model = $('#days');

            @if($model)
            $.ajax({
                type: 'post',
                url: '{{route('dashboard.core.selected-relation-model-ajax',$model->id)}}',
                data:{
                    _token: "{{ csrf_token() }}",
                    relationName: 'days',
                    columnName: 'name',
                    modelClass: 'App\\Domain\\Day\\Models\\Day',
                    selectedRelationClass: "App\\Domain\\Itinerary\\Models\\Itinerary",
                }
            }).then(function (data) {
                let array = [];
                $.each(data, function (index, value) {
                    array.push({id: index, text: value, selected: true});
                });
                model.select2({data: array}).trigger('change');
                selectDays(model);
            });
            @endif
            selectDays(model);
        });

    </script>
    </x-slot>
</x-form.model>
