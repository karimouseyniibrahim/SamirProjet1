<?php

namespace App\Application\DataTables;

use App\Application\Model\Inscription;
use Yajra\Datatables\Services\DataTable;

class InscriptionsDataTable extends DataTable
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
            ->addColumn('id', 'admin.inscription.buttons.id')
            ->addColumn('edit', 'admin.inscription.buttons.edit')
            ->addColumn('delete', 'admin.inscription.buttons.delete')
            ->addColumn('view', 'admin.inscription.buttons.view')
            ->addColumn('validation', 'admin.inscription.buttons.validation')
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Inscription::query();

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
            $query = $query->where("name", "=", request()->get("name"));
        }

        if (request()->has("status") && request()->get("status") != "") {
            $query = $query->where("status", "=", request()->get("status"));
        }

        if (request()->has("formation_id") && request()->get("formation_id") != "") {
            $query = $query->where("formation_id", "=", request()->get("formation_id"));
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
                'name' => 'id',
                'data' => 'id',
                'title' => trans('curd.id'),
            ],
            [
                'name' => "name",
                'data' => 'name',
                'title' => trans("inscription.name"),
            ],
            [
                'name' => "telephone",
                'data' => 'telephone',
                'title' => trans("inscription.telephone"),
            ],
            [
                'name' => "formation_id",
                'data' => 'formation_id',
                'title' => trans("inscription.formation_id"),
            ],
            [
                'name' => 'validation',
                'data' => 'validation',
                'title' => trans('inscription.validation'),
                'exportable' => false,
                'printable' => false,
                'searchable' => false,
                'orderable' => false,
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
        return 'Inscriptiondatatables_' . time();
    }
}