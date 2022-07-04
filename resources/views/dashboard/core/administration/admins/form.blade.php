<x-form.model route="dashboard.core.administration.admins" :name="__('Admins')">
    <x-form.input name="name" :label="__('Name')"/>
    <x-form.input name="email" type="email" :label="__('Email')"/>
    <x-form.input name="password" type="password" :label="__('Password')"/>
    <x-form.input name="password_confirmation" type="password"
                  :label="__('Password Confirmation')"/>
    <x-form.select name="roles[]" :options="$roles" multiple class="select2"
                   :selected="$selected ?? [] " :label="__('Roles')"/>
</x-form.model>
