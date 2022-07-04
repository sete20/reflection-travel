<x-form.model route="dashboard.user.users" :name="__('Users')">
    <x-form.input name="name" :label="__('Name')"/>
    <x-form.input name="first_name" :label="__('First Name')"/>
    <x-form.input name="last_name" :label="__('Last Name')"/>
    <x-form.input name="email" :label="__('Email')"/>
    <x-form.input name="password" :label="__('Password')"/>
</x-form.model>
