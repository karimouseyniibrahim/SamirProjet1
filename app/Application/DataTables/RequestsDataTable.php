<?php

namespace App\Application\DataTables;

use App\Application\Model\RequestLocal;
use Yajra\Datatables\Services\DataTable;

class RequestsDataTable extends DataTable
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
              ->addColumn('id', 'admin.request.buttons.id')
             ->addColumn('edit', 'admin.request.buttons.edit')
             ->addColumn('delete', 'admin.request.buttons.delete')
             ->addColumn('view', 'admin.request.buttons.view')
             ->addColumn('validation', 'admin.request.buttons.validation')
             ->make(true);
    }
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = RequestLocal::query();

        if(request()->has('from') && request()->get('from') != ''){
            $query = $query->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $query = $query->whereDate('created_at' , '<=' , request()->get('to'));
        }

		if(request()->has("artisan_id") && request()->get("artisan_id") != ""){
				$query = $query->where("artisan_id","=", request()->get("artisan_id"));
		}

		if(request()->has("section_id") && request()->get("section_id") != ""){
				$query = $query->where("section_id","=", request()->get("section_id"));
		}

		if(request()->has("local_id") && request()->get("local_id") != ""){
				$query = $query->where("local_id","=", request()->get("local_id"));
		}

		if(request()->has("status") && request()->get("status") != ""){
				$query = $query->where("status","=", request()->get("status"));
		}


        //dd($query);
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
                'name' => 'artisan_id',
                'data' => 'artisan_id',
                'title' => "artisan_id",
                
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

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Requestdatatables_' . time();
    }
}