$(document).ready(function(){

    $(".dashboard-form-select-ajax").each(function(){
        const model = $(this);
        const modelClass = model.data('model-class');
        const currentClass = model.data('current-class');
        const columnName = model.data('column-name');
        const displayColumnName = model.data('display-column-name');
        const whereColumnName = model.data('where-column-name');
        const whereColumnId = model.data('where-column-id');
        const selectedId = model.data('selected-id');
        const isMultiRelation = model.data('is-multi-relation');
        const route =model.data('route');
        const selectedRoute = model.data('selected-route');
        const selectedRelationName = model.data('selected-relation-name');
        const selectedRelationRoute = model.data('selected-relation-route');
        const selectedRelationClass = model.data('selected-relation-class');

        model.select2({
            ajax: {
                url: route,
                dataType: 'json',
                delay: 100,
                type: 'post',
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page,
                        columnName: columnName,
                        whereColumnName: whereColumnName,
                        whereColumnId: whereColumnId,
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    return {
                        results: data.data,
                        pagination: {
                            more: params.page < data.last_page
                        }
                    };
                },
                cache: false
            },
        });

        if(selectedId){
            $.ajax({
                type: 'post',
                url: selectedRoute,
            }).then(function (data) {
                // create the option and append to Select2
                if(displayColumnName){
                    columnName = displayColumnName;
                }
                var option = new Option(data[columnName], data.id, true, true);
                model.append(option).trigger('change');

                // manually trigger the `select2:select` event
                model.trigger({
                    type: 'select2:select',
                    params: {
                        data: data
                    }
                });

            });
        }

        if(isMultiRelation){
            $.ajax({
                type: 'post',
                url: selectedRelationRoute,
                data:{
                    relationName : selectedRelationName,
                    columnName: columnName,
                    currentClass : currentClass,
                    modelClass : modelClass,
                    selectedRelationClass : selectedRelationClass,
                    whereColumnName: whereColumnName,
                    whereColumnId: whereColumnId,
                }
            }).then(function (data) {
                let array = [];

                if (data.data === undefined || data.data.length == 0) {
                    model.select2({data: []});
                }else{
                    $.each(data.data, function (index, value) {
                        array.push({id: index, text: value, selected: false});
                    });
                    model.select2({data: array});
                }

                if (data.selected === undefined || data.selected.length == 0) {
                    model.select2({data: []});
                }else{
                    $.each(data.selected, function (index, value) {
                        array.push({id: index, text: value, selected: true});
                    });
                    model.select2({data: array});
                }

            });
        }

    });
});

