@php($route = ['index'=>'dashboard.home','update'=>'dashboard.core.administration.profile'])
<x-form.model :route="$route" :name="__('Admin Profile')">
    <x-form.input name="name" :label="__('Name')"/>
    <x-form.input name="email" type="email" :label="__('Email')"/>
    <x-form.input name="password" type="password" :label="__('Password')"/>
    <x-form.input name="password_confirmation" type="password"
                  :label="__('Password Confirmation')"/>
</x-form.model>
