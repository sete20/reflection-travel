@props(['name','icon'=>'','items'=>[]])
<li class="nav-item nav-item-submenu ">
    <a href="#" class="nav-link">
        @if($icon !== '')
            <i class="{{ $icon }}"></i>
        @endif
        <span>{{  $name  }}</span>
    </a>
    <ul class="nav nav-group-sub " data-submenu-title="{{ $name }}">
        @foreach($items as $item)
            <x-sidebar.link
                :name="$item['name']"
                :icon="$item['icon']"
                :url="$item['url']"
            />
        @endforeach
    </ul>
</li>
