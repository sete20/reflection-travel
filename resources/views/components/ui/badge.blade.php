@props(['value','types','color'])

@php($index = array_search(strtolower($value),array_map('strtolower',array_keys($types ?? [])),true))
@php($color = $color ?? StaticOptions::colors()[$index])
<span class="rounded inline-block text-sm px-2 bg-{{ $color }}-500 text-white py-1">
{{ __($value) }}
</span>