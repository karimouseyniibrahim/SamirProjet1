<li class="dd-item dd3-item" data-id="{{ $itemMenu['item']['id'] }}">
    <div class="dd-handle dd3-handle">{{ $itemMenu['item']['link'] }}</div>
    <div class="dd3-content">
        {{ getDefaultValueKey($itemMenu['item']['name']) }}
        <a href="{{ url('admin/deleteMenuItem/'. $itemMenu['item']['id']) }}" class="pull-right"><i class="material-icons">delete_forever</i></a>
        <a href="#" data-url="{{ url('admin/updateMenuItem/'. $itemMenu['item']['id']) }}" class="pull-right" data-id="{{ $itemMenu['item']['id'] }}" data-toggle="modal" data-target="#defaultModal"><i class="material-icons">mode_edit</i></a>
    </div>
        @if(array_key_exists('sub'  ,$itemMenu))           
            @foreach($itemMenu['sub'] as $men)
                @if ($loop->first)
                    <ol class="dd-list">
                @endif             
                        @include('admin.menu.helper.li',["itemMenu"=>$men])
                @if ($loop->last)
                    </ol>
                @endif
            @endforeach
        @endif
</li>



