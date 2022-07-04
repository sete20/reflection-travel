@section('actions')
    <button class="btn btn-primary" data-toggle="modal" data-target="#newAccommodationModal">
        <i class="icon-plus2"></i> {{ __("Create new accommodation") }}
    </button>
    <div class="modal fade" id="newAccommodationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Create new accommodation') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <a class="btn btn-primary" href="{{ route('dashboard.accommodation.accommodations.create', ['type' => 'hotel']) }}">{{ __('Hotel') }}</a>
                    <a class="btn btn-primary" href="{{ route('dashboard.accommodation.accommodations.create', ['type' => 'cruise']) }}">{{ __('Cruise') }}</a>
                </div>
            </div>
        </div>
    </div>

@endsection
<x-pages.crud
    :name="__('Accommodations')"
    route="dashboard.accommodation.accommodations"
    :datatable="$dataTable"
/>
