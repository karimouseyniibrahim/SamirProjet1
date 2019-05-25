@php
    $link = getPageLink(last(explode('/',$menus['item']['link'])));
    if (!is_null($link)) {
        $menus['item']['link'] = $link;
    }
@endphp
<li class="list-group-item">
    <a class="nav-link" href="{{ $menus['item']['link'] }}">
        {{ getDefaultValueKey($menus['item']['name']) }}
    </a>
</li>