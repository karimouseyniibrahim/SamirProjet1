<hr>
<p class="font-weight-bold dark-grey-text text-center text-uppercase spacing">
    <strong>{{ trans('website.menu') }}</strong>
</p>
<hr>
<ul class="list-unstyled">
@foreach (getMenu('website left') as $menus)
@php
    $link = getPageLink(last(explode('/',$menus['item']['link'])));
    if (!is_null($link)) {
        $menus['item']['link'] = $link;
    }
@endphp
<li>
    <a class="nav-link" href="{{ $menus['item']['link'] }}">
        {{ getDefaultValueKey($menus['item']['name']) }}
    </a>
</li>
@endforeach
</ul>
