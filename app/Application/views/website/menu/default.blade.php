@if (isset($menus['sub'])&&count($menus['sub'])!=0)
    <li class="nav-item dropdown mega-dropdown {{ $menus['item']->active ?? '' }}">
        <a class="nav-link dropdown-toggle text-uppercase font-weight-bold" data-toggle="dropdown"
           id="navbarDropdownMenuLink{{$menus['item']['id']}}"
           aria-haspopup="true" aria-expanded="false">{{ getDefaultValueKey($menus['item']['name']) }}
            <span class="sr-only">(current)</span>
        </a>
        <div class="dropdown-menu mega-menu v-2 z-depth-1 light-blue py-5 px-3"
             aria-labelledby="navbarDropdownMenuLink{{$menus['item']['id']}}">
            <div class="row">
                @foreach ($menus['sub'] as $item)

                    <div class="col-md-6 col-xl-4 sub-menu mb-4">
                        <h4>
                            <a href="{{ url($item['item']['link']) }}"
                               class="sub-title pb-3 text-uppercase font-weight-bold">{{ getDefaultValueKey($item['item']['name']) }}</a>
                        </h4>
                        <ul class="list-unstyled">
                            @foreach ($item['sub'] as $subitem) @if(in_array("App\\Application\\Controllers\\Website\\PageController", $subitem['item']['controller_path']))
                                @php $link = getPageLink(last(explode('/',$subitem['item']['link']))); if (!is_null($link)) { $subitem['item']['link']
					= $link; }
                                @endphp @endif
                            <li>
                                <a class="menu-item pl-0" href="{{$subitem['item']['link']}}">

                                    <i class="fas fa-caret-right pl-1 pr-3"></i>{{getDefaultValueKey($subitem['item']['name'])}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </li>
@elseif(isset($menus['sub']))
    <li class="nav-item {{ $menus['item']->active ?? '' }}">
        <a class="nav-link text-uppercase font-weight-bold" href="{{$menus['item']['link']}}"
           id="navbarDropdownMenuLink{{$menus['item']['id']}}" aria-haspopup="true"
           aria-expanded="false">{{ getDefaultValueKey($menus['item']['name']) }}
            <span class="sr-only">(current)</span>
        </a>
    </li>
@endif