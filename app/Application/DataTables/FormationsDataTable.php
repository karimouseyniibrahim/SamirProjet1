<?php

namespace App\Application\DataTables;

use App\Application\Model\Formation;
use Yajra\Datatables\Services\DataTable;

class FormationsDataTable extends DataTable
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
            ->addColumn('id', 'admin.formation.buttons.id')
            ->addColumn('edit', 'admin.formation.buttons.edit')
            ->addColumn('delete', 'admin.formation.buttons.delete')
            ->addColumn('view', 'admin.formation.buttons.view')
            /*->addColumn('name', 'admin.formation.buttons.langcol')*/
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Formation::query();

        if (request()->has('from') && request()->get('from') != '') {
            $query = $query->whereDate('created_at', '>=', request()->get('from'));
        }

        if (request()->has('to') && request()->get('to') != '') {
            $query = $query->whereDate('created_at', '<=', request()->get('to'));
        }

        if (request()->has("libelle") && request()->get("libelle") != "") {
            $query = $query->where("libelle", "like", "%" . request()->get("libelle") . "%");
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
                'name' => 'libelle',
                'data' => 'libelle',
                'title' => trans("formation.libelle"),
                'render' => 'function(){
                        return JSON.parse(this.libelle).' . getCurrentLang() . ';
                    }',
            ],
            [
                'name' => 'price',
                'data' => 'price',
                'title' => trans("formation.price")
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
        return 'Formationdatatables_' . time();
    }
}