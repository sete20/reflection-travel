@props(['name','icon'=>'','url'])
<li class="nav-item">
    <a href="{{ $url }}" class="nav-link @if(request()->fullUrl() === $url) active @endif">
        @if($icon !== '')
            <i class="{{ $icon }}"></i>
        @endif
        <span>{{ $name }}</span>
    </a>
</li>
