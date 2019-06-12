<?php

namespace App\Application\DataTables;

use App\Application\Model\Colis;
use Yajra\Datatables\Services\DataTable;

class ColissDataTable extends DataTable
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
              ->addColumn('id', 'admin.colis.buttons.id')
             ->addColumn('edit', 'admin.colis.buttons.edit')
             ->addColumn('delete', 'admin.colis.buttons.delete')
             ->addColumn('view', 'admin.colis.buttons.view')
             ->addColumn('validate', 'admin.colis.buttons.validate')
             /*->addColumn('name', 'admin.colis.buttons.langcol')*/
             ->make(true);
    }
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Colis::query();

        if (auth()->user()->group_id != 1) {
          $query = $query->where('partenaire_id' , auth()->user()->id);
        }
        

        if(request()->has('from') && request()->get('from') != ''){
            $query = $query->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $query = $query->whereDate('created_at' , '<=' , request()->get('to'));
        }

		if(request()->has("colis_id") && request()->get("colis_id") != ""){
				$query = $query->where("colis_id","=", request()->get("colis_id"));
		}

		if(request()->has("client_id") && request()->get("client_id") != ""){
				$query = $query->where("client_id","=", request()->get("client_id"));
		}

		if(request()->has("poids") && request()->get("poids") != ""){
				$query = $query->where("poids","=", request()->get("poids"));
		}

		if(request()->has("volume") && request()->get("volume") != ""){
				$query = $query->where("volume","=", request()->get("volume"));
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
                'name' => 'colis_id',
                'data' => 'colis_id',
                'title' => trans('colis.colis_id'),
                
                ],
                [
                'name' => 'client_id',
                'data' => 'client_id',
                'title' => trans('colis.client_id'),
                
                ],
                [
                'name' => 'adresse_liv',
                'data' => 'adresse_liv',
                'title' => trans('colis.adresse_liv'),
                
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
                  'title' =>  trans('curd.edit'),
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
              [
                   'name' => 'validate',
                   'data' => 'validate',
                   'title' => trans('colis.validate'),
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
        return 'Colisdatatables_' . time();
    }
}