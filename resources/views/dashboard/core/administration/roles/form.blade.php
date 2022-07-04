<x-form.model route="dashboard.core.administration.roles" :name="__('Roles')">
    <x-form.input name="name" :label="__('Name')"/>
    <x-form.select name="permissions[]" :options="$permissions" multiple class="select2"
                   :label="__('Permissions')"/>
</x-form.model>
