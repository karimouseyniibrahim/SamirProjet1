<?php


function layoutPath($file, $type = 'admin')
{
    return $type == 'admin'
        ? "admin.theme." . env('THEME') . "." . $file
        : "website.theme." . env('WEBSITE_THEME') . "." . $file;
}

function layoutMessage($type = 'admin')
{
    return layoutPath("layout.messages", $type);
}

function layoutExtend($type = 'admin', $layout = 'app')
{
    return layoutPath("layout." . $layout, $type);
}

function layoutMenu($type = 'admin')
{
    return layoutPath("layout.menu", $type);
}

function layoutMain($type = 'website')
{
    return layoutPath("layout.main", $type);
}

function layoutHomePage($type = 'admin')
{
    return layoutPath("home", $type);
}

function layoutFooter($type = 'admin')
{
    return layoutPath("layout.footer", $type);
}

function layoutSideBar($type = 'admin', $layout = 'side-bar')
{
    return layoutPath("layout." . $layout, $type);
}

function layoutContent($type = 'admin', $layout = 'content')
{
    return layoutPath("layout." . $layout, $type);
}

function layoutPushHeader($type = 'admin')
{
    return layoutPath("layout.after-menu", $type);
}

function layoutPushFooter($type = 'admin')
{
    return layoutPath("layout.before-footer", $type);
}

function layoutPaginate($type = 'website')
{
    return layoutPath("layout.paginate", $type);
}

function layoutForm()
{
    return layoutPath("layout.form");
}


function layoutHeader()
{
    return layoutPath("layout.header");
}

function layoutBreadcrumb()
{
    return layoutPath("layout.breadcrumb");
}

function layoutTable()
{
    return layoutPath("layout.table");
}


function is_json($string, $return_data = false)
{
    $data = json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE) ? ($return_data ? $data : TRUE) : FALSE;
}

function dataTableConfig()
{
    return [
        'dom' => 'Bfrtip',
        'buttons' => ['excel', 'print', 'reset', 'reload'],
        'responsive' => true,
//        'autoWidth' =>  true,
        'stateSave' => 'saveState',
//        'initComplete' => "function () {
//                            var allColumns = this.api().column().columns()[0].length -4 ;
//                            var width = 50;
//                            this.api().columns().every(function (index) {
//                                var column = this;
//                                if(index  <=  allColumns){
//                                if(index != 0){
//                                    width=100;
//                                }
//                                    var title = $('#dataTableBuilder thead th').eq(index).text()
//                                    var input = '<input type=\"text\" class=\"form-control\" style=\"width: '+width+'px;\" placeholder=\"'+title+'\" />';
//                                    $(input).appendTo($(column.footer()).empty())
//                                    .on('change', function () {
//                                        column.search($(this).val(), false, false, true).draw();
//                                    });
//                                }
//                            });
//                }"
    ];
}

function permissionArray()
{
    $psermisions = new  \App\Application\Controllers\Traits\UsePermissionTrait();
    $psermisions->can(auth()->user());
    return array_keys($psermisions->permission);
}

function user_can($controller, $action)
{
    $psermisions = new  \App\Application\Controllers\Traits\UsePermissionTrait();
    $psermisions->can(auth()->user());
    if (!array_key_exists($controller, $psermisions->permission)) {
        return false;
    }
    if (!array_key_exists($action, $psermisions->permission[$controller])) {
        return false;
    }
    if (array_intersect([$action => true], $psermisions->permission[$controller])) {
        return true;
    } 
    return false;
}

function logo()
{
    $l = \App\Application\Model\Setting::find(3);

    return $l->body_setting;
}

function img_cam()
{
    $l = \App\Application\Model\Setting::find(4);
    return $l->body_setting;
}

function setting($name)
{
    $l = \App\Application\Model\Setting::where("name", $name)->first();

    return $l != null ? $l->body_setting : null;
}



