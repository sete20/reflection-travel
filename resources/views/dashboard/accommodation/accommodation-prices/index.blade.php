@section('actions')

@endsection
<x-pages.crud
    :name="__('AccommodationPrices')"
    route="dashboard.accommodation.accommodation-prices"
    :datatable="$dataTable"
/>
