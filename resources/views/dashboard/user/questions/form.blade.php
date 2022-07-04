<x-form.model route="dashboard.user.questions" :name="__('Questions')">
    <x-form.input name="title" :label="__('Title')"/>
    <x-form.input type="textarea" name="answer" :label="__('Answer')"/>
    @if(auth()->user()->hasRole('super'))
        <x-form.select-ajax name="user_id"
                            column-name="first_name,' ', last_name"
                            display-column-name="full_name"
                            :modelClass="$userClass"
                            :selected="$model?->user_id"
                            :selectedId="$model?->user_id"
                            :label="__('User')"/>
        <x-form.select :options="['pending'=>__('Pending'), 'live'=>__('live')]" name="status" selected="pending" :label="__('Status')"/>
    @endif
</x-form.model>
