<?php

namespace App\DataTables;

use App\Common\DataTables\DataTableBase;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Services\DataTable;

class UserDataTable extends DataTableBase
{
//    protected $fixedColumns = array(
//        'leftColumns' =>  2
//    );

    protected $model = 'user';
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = User::query();

        return $this->applyScopes($query);
    }

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        $dataTable = $this->datatables->eloquent($this->query());

        $dataTable->addColumn('action', function ($data) {
            return render_column_action($data);
        });

        return $dataTable->make(true);
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'usersdatatables_' . time();
    }

    public function setColumns()
    {
        return array(
            array(
                'data' => 'id',
                'name' => 'id',
                'title' => trans('admin.user.fields.id')
            ),
            array(
                'data' => 'name',
                'name' => 'name',
                'title' => trans('admin.user.fields.name'),
                'select2' => User::orderBy('name', 'asc')->pluck('name', 'name')->toArray()
            ),
            array(
                'data' => 'email',
                'name' => 'email',
                'title' => trans('admin.user.fields.email'),
                'select2' => User::orderBy('email', 'asc')->pluck('email', 'email')->toArray()
            ),
        );
    }
}
