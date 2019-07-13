<?php

namespace App\Application\DataTables;

use App\Application\Model\Colis;
use Yajra\Datatables\Services\DataTable;

use Yajra\Datatables\Datatables;
use Illuminate\Contracts\View\Factory;

class ColissDataTable extends DataTable
{

    public $cols;

    public function __construct(Datatables $datatables, Factory $viewFactory)
    {
        parent::__construct($datatables, $viewFactory);
        $this->cols = [];
    }

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
      $datatables = $this->datatables
                      ->eloquent($this->query())
                      ->addColumn('id', 'admin.colis.buttons.id');
      if (user_can('App\Application\Controllers\Admin\ColisController', 'update')) {
        $datatables = $datatables->addColumn('edit', 'admin.colis.buttons.edit');
      }
      if (user_can('App\Application\Controllers\Admin\ColisController', 'destroy')) {
        $datatables = $datatables->addColumn('delete', 'admin.colis.buttons.delete');
      }
      if (user_can('App\Application\Controllers\Admin\ColisController', 'show')) {
        $datatables = $datatables->addColumn('view', 'admin.colis.buttons.view');
      }
      if (user_can('App\Application\Controllers\Admin\ColisController', 'validate')) {
        $datatables = $datatables->addColumn('validate', 'admin.colis.buttons.validate');
      }

      return $datatables->make(true);
        // return $this->datatables
        //       ->eloquent($this->query())
        //       ->addColumn('id', 'admin.colis.buttons.id')
        //       ->addColumn('edit', 'admin.colis.buttons.edit')
        //        ->addColumn('delete', 'admin.colis.buttons.delete')
        //        ->addColumn('view', 'admin.colis.buttons.view')
        //        ->addColumn('validate', 'admin.colis.buttons.validate')
        //      /*->addColumn('name', 'admin.colis.buttons.langcol')*/
        //       ->make(true);
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
            if (auth()->user()->group_id == 5) {
                $query = $query->where('client_id' , auth()->user()->id);
            } else {
                $query = $query->where('partenaire_id' , auth()->user()->id);
            }
        }

    		if(request()->has("colis_id") && request()->get("colis_id") != ""){
    				$query = $query->where("colis_id","=", request()->get("colis_id"));
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
        
      if (user_can('App\Application\Controllers\Admin\ColisController', 'show')) {
        array_push($this->cols, [
                  'name' => 'view',
                  'data' => 'view',
                  'title' => trans('curd.view'),
                  'exportable' => false,
                  'printable' => false,
                  'searchable' => false,
                  'orderable' => false,
             ]);
      }
      if (user_can('App\Application\Controllers\Admin\ColisController', 'update')) {
        array_push($this->cols, [
                  'name' => 'edit',
                  'data' => 'edit',
                  'title' =>  trans('curd.edit'),
                  'exportable' => false,
                  'printable' => false,
                  'searchable' => false,
                  'orderable' => false,
             ]);
      }
      if (user_can('App\Application\Controllers\Admin\ColisController', 'destroy')) {
        array_push($this->cols, [
                   'name' => 'delete',
                   'data' => 'delete',
                   'title' => trans('curd.delete'),
                   'exportable' => false,
                   'printable' => false,
                   'searchable' => false,
                   'orderable' => false,
             ]);
      }
      if (user_can('App\Application\Controllers\Admin\ColisController', 'validate')) {
        array_push($this->cols, [
                   'name' => 'validate',
                   'data' => 'validate',
                   'title' => trans('colis.validate'),
                   'exportable' => false,
                   'printable' => false,
                   'searchable' => false,
                   'orderable' => false,
             ]);
      }
        
        return empty($this->cols) 
          ? [
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
                'name' => 'adresse_liv',
                'data' => 'adresse_liv',
                'title' => trans('colis.adresse_liv'),
              ],
              [
                'name' => 'statut_liv',
                'data' => 'statut_liv',
                'title' => trans('colis.statut_liv'),
              ],
              [
                'name' => 'localisation',
                'data' => 'localisation',
                'title' => trans('colis.localisation'),
              ]
          ]
          :  array_merge([
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
                'name' => 'adresse_liv',
                'data' => 'adresse_liv',
                'title' => trans('colis.adresse_liv'),
              ],
              [
                'name' => 'statut_liv',
                'data' => 'statut_liv',
                'title' => trans('colis.statut_liv'),
              ],
              [
                'name' => 'localisation',
                'data' => 'localisation',
                'title' => trans('colis.localisation'),
              ]
          ],
          $this->cols
        );
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