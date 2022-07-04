<x-form.model route="dashboard.accommodation.accommodations" :name="__('Accommodations')">
    @php($accommodation_type = request()->has('type')?request()->type:null)
    <input class="col-md-6" type="hidden" name="type" value="{{$accommodation_type ?? $model?->type}}">
    <x-form.input wrapperClass="col-md-6" name="name" :label="__(ucfirst($accommodation_type).' Name')"/>
    <x-form.input wrapperClass="col-md-6" name="address" :label="__(ucfirst($accommodation_type).' Address')"/>
    <x-form.select wrapperClass="col-md-6" class="select2" :options="$cities" :selected="$model?->city_id" name="city_id" :label="__('City')"/>
    <x-form.input wrapperClass="col-md-6" type="email" name="reservation_email" :label="__('Reservation Email')"/>
    <x-form.input wrapperClass="col-md-6" name="reservation_phone" :label="__('Reservation Phone')"/>
    <x-form.input wrapperClass="col-md-6" name="reception_phone" :label="__('Reception Phone')"/>
    <x-form.input wrapperClass="col-md-6" name="bank_name" :label="__('Bank Name')"/>
    <x-form.input wrapperClass="col-md-6" name="bank_account_number" :label="__('Bank Account Number')"/>
    <x-form.input wrapperClass="col-md-6" name="accounting_phone" :label="__('Accounting Phone')"/>
    <x-form.input wrapperClass="col-md-6" type="number" min="0" max="100000000" name="tourguide_night_fee" :label="__('Tourguide Night Fee')"/>
    <x-form.input wrapperClass="col-md-6" type="textarea" name="note" :label="__('Note')"/>

    <x-form.select wrapperClass="col-md-6" multiple class="select2" :options="$views" :selected="$model?->view_ids" name="views[]" :label="__('Views')"/>

</x-form.model>
