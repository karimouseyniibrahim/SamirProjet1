@php
    $link = getPageLink(last(explode('/',$menus['item']['link'])));
    if (!is_null($link)) {
        $menus['item']['link'] = $link;
    }
@endphp
<li class="menu-item nav-item">
    <a href="{{ $menus['item']['link'] }}" class="nav-link">
        {{ getDefaultValueKey($menus['item']['name']) }}
    </a>
</li>