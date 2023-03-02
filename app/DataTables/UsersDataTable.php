<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('name', function ($query) {
                return $query->first_name . ' ' . $query->last_name;
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 'Inactive') {
                    $title = 'Inactive';
                    $class = 'badge-danger';
                } else {
                    $title = 'Active';
                    $class = 'badge-success';
                }
                return '<center><span class="badge ' . $class . ' badge-inline" style="color:black">' . $title . '</span></center>';
            })
            ->addColumn('action', function ($query) {
                $editUrl = route('getEditCustomer', $query->id);
                return '<center><div class="text-center">
                <a href=' . $editUrl . ' class="btn btn-sm btn-secondary"><i class="fa-regular fa-pen-to-square mr-2"></i> Edit</a>
                <a href="#" onclick="deleteCustomer(' . "'" . $query->id . "'" . ')" class="btn btn-sm btn-danger"><i class="bi bi-x-circle-fill mr-2"></i> Delete</a>
                </div></center>';
            })
            ->rawColumns(['status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        // return $model->newQuery();
        $users = User::role('customer')->orderBy('id', 'desc');
        return $this->applyScopes($users);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('userTable')
            ->columns($this->getColumns())
            ->minifiedAjax(route('get.Customer'))
            ->orderBy(1)
            ->responsive(true)
            ->autoWidth(100)
            ->selectStyleSingle()
            ->parameters([
                'paging' => true,
                'processing' => true,
                'serverSide' => true,
                'searching' => true,
                'info' => false,
                'searchDelay' => 350,
                'select' => true,
                'dom' => 'Blfrtip',
                'lengthMenu' => [4],
            ])
            ->addTableClass('table table-bordered table-hover gy-5 gs-7 border w-100');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('name'),
            Column::make('email'),
            Column::make('mobile_number'),
            Column::make('status')->addClass('text-center'),
            Column::make('action')->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
