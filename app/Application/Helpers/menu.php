<?php
function menu($name = 'Main', $main = 'ul', $mClass = '', $sclass = '', $smclass = '', $ssclass = '')
{
    $out = '<' . $main . ' class="' . $mClass . '">';

    foreach (getMenu($name) as $menus) {
        $out .= '<li class="' . $sclass . '" data-id="' . $menus['item']['id'] . '">';
        foreach ($menus as $key => $menu) {
            if ($key == 'item') {
                $out .= extractHtml($menu);
            }
            if ($key == 'sub') {
                $out .= extractSubMenu($menu, $main, $smclass, $ssclass);
            }
        }
        $out .= '</li>';
    }
    $out .= '</' . $main . '>';
    return $out;
}

// function website_menu($name = 'website')
// {
//     $out = '';
//     foreach (getMenu($name) as $menus) {
//         $out .= '<li class="nav-item" data-id="' . $menus['item']['id'] . '">';
//         foreach ($menus as $key => $menu) {
//             if ($key == 'item') {
//                 $out .= '<a class="nav-link" href="'. url($menu['link']) .'">'. getDefaultValueKey($menu['name']) .'</a>';
//             }
//             if ($key == 'sub') {
//                 //$out .= 'extractSubMenu($menu, $main, $smclass, $ssclass)';
//             }
//         }
//         $out .= '</li>';
//     }
//     return $out;
// }

function website_menu($key, $view = null)
{

    if (is_null($view)) {
        $view = 'website.menu.' . $key;
    }

    if (!view()->exists($view)) {
        $view = 'website.menu.default';
    }

    $out = '';
    $lang = ['lang' => getCurrentLang()];
    foreach (getMenu($key) as $menus) {
        // if($menus['size']>3){
        //     $out.=getmultilevelMenu($menus);
        // }else{
        $out .= view($view, compact('menus'));
        // }
    }

    return $out;
}
function getmultilevelMenu($menu)
{
    $out = '<li class="nav-item dropdown multi-level-dropdown">
    <a href="' . $menu['item']['link'] . '" id="menu" data-toggle="dropdown" class="nav-link dropdown-toggle text-uppercase font-weight-bold">' . getDefaultValueKey($menu['item']['name']) . '</a>
    <ul class="dropdown-menu mega-menu v-2 z-depth-1 light-blue py-5 px-3">
    ';

    foreach ($menu['sub'] as $sub) {

        $out .= count($sub['sub']) != 0 ?
        '<li class="dropdown-item dropdown-submenu p-0">
                <a href="' . $sub['item']['link'] . '" data-toggle="dropdown" class="dropdown-toggle text-white w-100">' . getDefaultValueKey($sub['item']['name']) . '</a>
                ' . getmultilevelSubMenu($sub) . '
                </li>' :
        '<li class="dropdown-item p-0">
                <a href="' . $sub['item']['link'] . '" class="text-white w-100">' . getDefaultValueKey($sub['item']['name']) . '</a>
             </li>'
        ;
    }
    $out .= '</ul></li>';
    return $out;
}
function getmultilevelSubMenu($menu)
{
    $out = '<ul class="dropdown-menu ml-2 rounded-0 light-blue border-0 z-depth-1">
    ';

    foreach ($menu['sub'] as $sub) {

        $out .= count($sub['sub']) != 0 ?
        '<li class="dropdown-item dropdown-submenu p-0">
                <a href="' . $sub['item']['link'] . '" data-toggle="dropdown" class="dropdown-toggle text-white w-100">' . getDefaultValueKey($sub['item']['name']) . '</a>
                    ' . getmultilevelSubMenu($sub) . '
                </li>' :
        '<li class="dropdown-item p-0">
                <a href="' . $sub['item']['link'] . '" class="text-white w-100">' . getDefaultValueKey($sub['item']['name']) . '</a>
             </li>'
        ;
    }
    $out .= '</ul>';
    return $out;
}

function website_left_menu($name = 'website left')
{
    $out = '';
    foreach (getMenu($name) as $menus) {
        $out .= '<li class="list-group-item" data-id="' . $menus['item']['id'] . '">';
        foreach ($menus as $key => $menu) {
            if ($key == 'item') {
                $out .= '<a class="nav-link" href="' . url($menu['link']) . '">' . getDefaultValueKey($menu['name']) . '</a>';
            }
            if ($key == 'sub') {
                //$out .= 'extractSubMenu($menu, $main, $smclass, $ssclass)';
            }
        }
        $out .= '</li>';
    }
    return $out;
}

function getMenu($name)
{
    $array = [];
    $way = [];

    foreach (get($name) as $mainKey => $main) {
        foreach ($main as $m) {

            if ($mainKey == 0) {
                // dd($main);
                $array[$m->id] = ['item' => menuArray($m), 'size' => 1, 'sub' => []];
                $way[$m->id] = $m->id;
            } else {

                if (array_key_exists($m->parent_id, $array)) {
                    $way[$m->id] = $way[$m->parent_id] . '.sub.' . $m->id;
                    $array[$m->parent_id]["sub"]['' . $m->id . ''] = ['item' => menuArray($m),
                        'size' => 2,
                        'sub' => []];
                    $array[$m->parent_id]['size'] = 2;
                } else {
                    $way[$m->id] = $way[$m->parent_id] . '.sub.' . $m->id;

                    $array[$m->id] = ['item' => menuArray($m),
                        'size' => 1,
                        'sub' => []];
                }
            }
        }
    }
    //dd($array,$way);

    return getorderInMenu($way, $array);
}

function getorderInMenu($keyway, $array)
{
    foreach ($keyway as $key => $value) {
        $t = explode('.' . $key, $value);
        if ($t[0] != null && data_get($array, $value) == null && data_get($array, $key) != null) {
            $parentway = Illuminate\Support\Str::replaceLast('.sub', '', $t[0]);
            data_set($array, $t[0] . '.' . $key, data_get($array, $key), true);
            //data_set($array, $t[0].'.'.$key,data_get($array, $key)    , true);
            $size = explode('sub', $value);
            data_set($array, $value . '.size', count($size), true);

            if ((count($size) - 1 + data_get($array, $key . '.size')) > data_get($array, $size[0] . 'size')) {
                data_set($array, $size[0] . 'size', count($size) - 1 + data_get($array, $key . '.size'), true);
                // dd($array);
            }
            unset($array[$key]);
        }

    }
    // dd($array);
    return $array;
}

function getMenu2($name)
{
    $array = [];
    foreach (get($name) as $mainKey => $main) {
        foreach ($main as $m) {
            if ($mainKey == 0) {
                $array[$m->id] = ['item' => menuArray($m)];
            } else {
                if (array_key_exists($m->parent_id, $array)) {
                    if (array_key_exists('sub', $array[$m->parent_id])) {
                        $array[$m->parent_id]['sub'] = array_merge($array[$m->parent_id]['sub'], [menuArray($m)]);
                    } else {
                        $array[$m->parent_id] = array_merge($array[$m->parent_id], ['sub' => [menuArray($m)]]);
                    }
                } else {
                    $array[$m->id] = ['item' => menuArray($m)];
                }
            }
        }
    }
    return $array;
}

function get($name)
{
    return \App\Application\Model\Menu::where('name', $name)->with(['item' => function ($query) {
        return $query->orderBy('parent_id', 'asc')->orderBy('order', 'asc');
    }])->first()->item->groupBy('parent_id');
}

function menuArray($main)
{
    return [
        'name' => $main->name,
        'icon' => $main->icon,
        'link' => $main->link,
        'type' => $main->type,
        'id' => $main->id,
        'order' => $main->order,
        'parent_id' => $main->order,
        'controller_path' => json_decode($main->controller_path),
    ];
}

function extractHtml($main)
{
    $out = '<a href="' . url($main['link']) . '" title="' . getDefaultValueKey($main['name']) . '" target="' . $main['type'] . '">';
    if ($main['icon'] != '') {
        $out .= $main['icon'];
    }
    $out .= getDefaultValueKey($main['name']);
    $out .= '</a>';
    return $out;
}

function extractSubMenu($sub, $main = 'ul', $smclass = '', $ssclass = '')
{
    $out = '<' . $main . ' class="' . $smclass . '">';
    foreach ($sub as $s) {
        $out .= '<li class="' . $ssclass . '" data-id="' . $s['id'] . '">';
        $out .= extractHtml($s);
        $out .= '</li>';
    }
    $out .= '</' . $main . '>';
    return $out;
}

function getPageLink($slug)
{
    $pages = App\Application\Model\Page::where('active', true)->get();
    $fields = $pages->where('slug_fr', str_slug($slug))->first();
    if (is_null($fields)) {
        return null;
    }
//    dd($fields->url);
    return $fields->url;
}
