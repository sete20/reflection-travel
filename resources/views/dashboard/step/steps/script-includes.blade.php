<script>
    function selectIncludes(model,city_id = null){
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
                        relationName: 'includes',
                        columnName: 'name',
                        model_id: '{{$model?->id}}',
                        modelClass: 'App\\Domain\\CoreTour\\Models\\IncludeModel',
                        currentClass: "App\\Domain\\Step\\Models\\Step",
                        whereColumnName: 'city_id',
                        whereColumnId: city_id,
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
        let city = $('#citySelectJs');
        let model = $('#includesJs');
        let city_id = city.val();

        $(document.body).on('change', '#citySelectJs', function (e) {
            let city_id = $(this).val();
            selectIncludes(model,city_id);
        });
        @if($model)
        $.ajax({
            type: 'post',
            url: '{{route('dashboard.core.selected-relation-model-ajax',$model->id)}}',
            data:{
                _token: "{{ csrf_token() }}",
                relationName: 'includes',
                columnName: 'name',
                modelClass: 'App\\Domain\\CoreTour\\Models\\IncludeModel',
                selectedRelationClass: "App\\Domain\\Step\\Models\\Step",
                whereColumnName: 'city_id',
                whereColumnId: city_id,
            }
        }).then(function (data) {
            let array = [];
            $.each(data, function (index, value) {
                array.push({id: index, text: value, selected: true});
            });
            model.select2({data: array}).trigger('change');
            selectIncludes(model,city_id);
        });
        @endif
        selectIncludes(model,city_id);
    });

</script>
