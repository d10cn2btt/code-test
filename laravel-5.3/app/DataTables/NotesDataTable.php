<?php

namespace App\DataTables;

use App\Common\DataTables\DataTableBase;
use App\Models\Notes;
use Yajra\Datatables\Services\DataTable;

class NotesDataTable extends DataTableBase
{

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        $dataTable = $this->datatables->eloquent($this->query());

        $dataTable->editColumn('body', function ($data) {
            return show_content_ck($data->body);
        });

        $dataTable->editColumn('status', function ($data) {
            return Notes::getStatus($data->status);
        });

        $dataTable->addColumn('action', function ($data) {
            return render_column_action($data);
        });

        return $dataTable->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Notes::query()->with('users');

        return $this->applyScopes($query);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function setColumns()
    {
        return [
            array(
                'title' => trans('admin.notes.fields.id'),
                'data' => 'id',
                'name' => 'notes.id'
            ),
            array(
                'title' => trans('admin.notes.fields.title'),
                'data' => 'title',
                'name' => 'notes.title'
            ),
            array(
                'title' => trans('admin.notes.fields.body'),
                'data' => 'body',
                'name' => 'notes.body'
            ),
            array(
                'title' => trans('admin.notes.fields.created_by'),
                'data' => 'users.name',
                'name' => 'users.id'
            ),
            array(
                'title' => trans('admin.notes.fields.status'),
                'data' => 'status',
                'name' => 'notes.status',
                'select2' => Notes::getStatus()
            )
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'notesdatatables_' . time();
    }
}
