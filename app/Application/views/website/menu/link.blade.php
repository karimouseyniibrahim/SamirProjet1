@php
    $link = getPageLink(last(explode('/',$menus['item']['link'])));
    if (!is_null($link)) {
        $menus['item']['link'] = $link;
    }
@endphp
<p>
    <a href="{{ $menus['item']['link'] }}">{{ getDefaultValueKey($menus['item']['name']) }}</a>
</p>