<?php

namespace App\Application\DataTables;

use App\Application\Model\Artisan;
use Yajra\Datatables\Services\DataTable;

class ArtisansDataTable extends DataTable
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
            ->addColumn('id', 'admin.artisan.buttons.id')
            ->addColumn('edit', 'admin.artisan.buttons.edit')
            ->addColumn('delete', 'admin.artisan.buttons.delete')
            ->addColumn('view', 'admin.artisan.buttons.view')
            /*->addColumn('name', 'admin.artisan.buttons.langcol')*/
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Artisan::query();

        if (request()->has('from') && request()->get('from') != '') {
            $query = $query->whereDate('created_at', '>=', request()->get('from'));
        }

        if (request()->has('to') && request()->get('to') != '') {
            $query = $query->whereDate('created_at', '<=', request()->get('to'));
        }

        if (request()->has("numero_artisan") && request()->get("numero_artisan") != "") {
            $query = $query->where("numero_artisan", "=", request()->get("numero_artisan"));
        }

        if (request()->has("name") && request()->get("name") != "") {
            $query = $query->where("name", "like", "%" . request()->get("name") . "%");
        }

        if (request()->has("telephone") && request()->get("telephone") != "") {
            $query = $query->where("telephone", "=", request()->get("telephone"));
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
                'name' => 'numero_artisan',
                'data' => 'numero_artisan',
                'title' => trans("artisan.numero_artisan"),

            ],
            [
                'name' => 'name',
                'data' => 'name',
                'title' => trans("artisan.name"),
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
        return 'Artisandatatables_' . time();
    }
}