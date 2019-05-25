<?php

namespace App\Application\DataTables;

use App\Application\Model\Site;
use Yajra\Datatables\Services\DataTable;

class SitesDataTable extends DataTable
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
            ->addColumn('id', 'admin.site.buttons.id')
            ->addColumn('edit', 'admin.site.buttons.edit')
            ->addColumn('delete', 'admin.site.buttons.delete')
            ->addColumn('view', 'admin.site.buttons.view')
            /*->addColumn('name', 'admin.site.buttons.langcol')*/
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Site::query();

        if (request()->has('from') && request()->get('from') != '') {
            $query = $query->whereDate('created_at', '>=', request()->get('from'));
        }

        if (request()->has('to') && request()->get('to') != '') {
            $query = $query->whereDate('created_at', '<=', request()->get('to'));
        }

        if (request()->has("name") && request()->get("name") != "") {
            $query = $query->where("name", "like", "%" . request()->get("name") . "%");
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
                'title' => trans("site.name"),
                'render' => 'function(){
                        return JSON.parse(this.name).' . getCurrentLang() . ';
                    }',
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
        return 'Sitedatatables_' . time();
    }
}