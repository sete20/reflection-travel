@props(['name','icon','items'])
<li class="nav-item-header">
    <div class="text-uppercase font-size-xs line-height-xs">
        {{ $name }}
    </div>
    <i class="{{ $icon }}" title="{{ $name }}"></i></li>
@foreach($items as $item)
    @continue($item['permission'] !== '' && !auth()->user()->can($item['permission']))
    @if(isset($item['items']))
        <x-sidebar.menu
            :name="$item['name']"
            :icon="$item['icon']"
            :items="$item['items']"
        />
    @else
        <x-sidebar.link
            :name="$item['name']"
            :icon="$item['icon']"
            :url="$item['url']"
        />
    @endif
@endforeach
