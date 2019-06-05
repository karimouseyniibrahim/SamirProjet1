<?php

namespace App\Application\DataTables;

use App\Application\Model\Commandeproduit;
use Yajra\Datatables\Services\DataTable;

class CommandeProduitsDataTable extends DataTable
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
              ->addColumn('id', 'admin.commandeproduit.buttons.id')
             ->addColumn('edit', 'admin.commandeproduit.buttons.edit')
             ->addColumn('delete', 'admin.commandeproduit.buttons.delete')
             ->addColumn('view', 'admin.commandeproduit.buttons.view')
             /*->addColumn('name', 'admin.commandeproduit.buttons.langcol')*/
             ->make(true);
    }
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Commandeproduit::query();

        if(request()->has('from') && request()->get('from') != ''){
            $query = $query->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $query = $query->whereDate('created_at' , '<=' , request()->get('to'));
        }

		if(request()->has("modeEnvoi") && request()->get("modeEnvoi") != ""){
				$query = $query->where("modeEnvoi","=", request()->get("modeEnvoi"));
		}

		if(request()->has("devis") && request()->get("devis") != ""){
				$query = $query->where("devis","=", request()->get("devis"));
		}

		if(request()->has("typecommande") && request()->get("typecommande") != ""){
				$query = $query->where("typecommande","=", request()->get("typecommande"));
		}

		if(request()->has("fraistransport") && request()->get("fraistransport") != ""){
				$query = $query->where("fraistransport","=", request()->get("fraistransport"));
		}

		if(request()->has("paye") && request()->get("paye") != ""){
				$query = $query->where("paye","=", request()->get("paye"));
		}

		if(request()->has("dateacheminer") && request()->get("dateacheminer") != ""){
				$query = $query->where("dateacheminer","=", request()->get("dateacheminer"));
		}

		if(request()->has("delaislivraison") && request()->get("delaislivraison") != ""){
				$query = $query->where("delaislivraison","=", request()->get("delaislivraison"));
		}

		if(request()->has("datedebutacheminement") && request()->get("datedebutacheminement") != ""){
				$query = $query->where("datedebutacheminement","=", request()->get("datedebutacheminement"));
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
                'name' => 'modeEnvoi',
                'data' => 'modeEnvoi',
                'title' => "modeEnvoi",
                
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
        return 'Commandeproduitdatatables_' . time();
    }
}