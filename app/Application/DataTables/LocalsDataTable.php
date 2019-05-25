<?php

namespace App\Application\DataTables;

use App\Application\Model\Local;
use Yajra\Datatables\Services\DataTable;

class LocalsDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('id', 'admin.local.buttons.id')
            ->addColumn('edit', 'admin.local.buttons.edit')
            ->addColumn('delete', 'admin.local.buttons.delete')
            ->addColumn('view', 'admin.local.buttons.view')
            /*->addColumn('name', 'admin.local.buttons.langcol')*/
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Local::query();

        if (request()->has('from') && request()->get('from') != '') {
            $query = $query->whereDate('created_at', '>=', request()->get('from'));
        }

        if (request()->has('to') && request()->get('to') != '') {
            $query = $query->whereDate('created_at', '<=', request()->get('to'));
        }

        if (request()->has("name") && request()->get("name") != "") {
            $query = $query->where("name", "like", "%" . request()->get("name") . "%");
        }

        if (request()->has("price") && request()->get("price") != "") {
            $query = $query->where("price", "=", request()->get("price"));
        }

        if (request()->has("area") && request()->get("area") != "") {
            $query = $query->where("area", "=", request()->get("area"));
        }

        if (request()->has("site_id") && request()->get("site_id") != "") {
            $query = $query->where("site_id", "=", request()->get("site_id"));
        }

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->parameters(dataTableConfig());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name' => "id",
                'data' => 'id',
                'title' => trans('curd.id'),
            ],
            [
                'name' => 'name',
                'data' => 'name',
                'title' => trans("local.name"),
                'render' => 'function(){
                        return JSON.parse(this.name).' . getCurrentLang() . ';
                    }',
            ],
            [
                'name' => 'price',
                'data' => 'price',
                'title' => trans('local.price'),
            ],
            [
                'name' => 'view',
                'data' => 'view',
                'title' => trans('curd.view'),
                'exportable' => false,
                'printable' => false,
                'searchable' => false,
                'orderable' => false,
            ],
            [
                'name' => 'edit',
                'data' => 'edit',
                'title' => trans('curd.edit'),
                'exportable' => false,
                'printable' => false,
                'searchable' => false,
                'orderable' => false,
            ],
            [
                'name' => 'delete',
                'data' => 'delete',
                'title' => trans('curd.delete'),
                'exportable' => false,
                'printable' => false,
                'searchable' => false,
                'orderable' => false,
            ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Localdatatables_' . time();
    }
}