<?php

namespace App\DataTables;

use App\Common\DataTables\DataTableBase;
use App\Models\User;
use Yajra\Datatables\Services\DataTable;

class UsersDataTable extends DataTableBase {

	protected $columns = array(
		'id',
		'name',
		'email',
		'created_at',
		'updated_at',
	);

	/**
	 * Get the query object to be processed by dataTables.
	 *
	 * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
	 */
	public function query() {
		$query = User::query();

		return $this->applyScopes( $query );
	}

	/**
	 * Display ajax response.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function ajax() {
		$dataTable = $this->datatables->eloquent( $this->query() );

		$dataTable->addColumn( 'action', function ( $data ) {
			return render_column_action( $data );
		} );

		return $dataTable->make( true );
	}

	protected function getBuilderParameters() {
		return [
			'order'        => [ [ 0, 'desc' ] ],
			'dom'          => "<'row'<'col-md-6'l><'col-md-6 text-right'B>><'row'<'col-md-12'tr>><'row'<'col-md-5'i><'col-md-7'p>>",
			'buttons'      => $this->buttons,
			'initComplete' => "function () {
				var totalColumn = this.api().columns()[0].length;
				var count = 0;
                this.api().columns().every(function () {
                	count++;
                    if (count < totalColumn) {
	                    var column = this;
	                    
	                    var input = document.createElement(\"input\");
	                    input.style.width = '100%';
	                    input.className += 'form-control ';
	                    
	                    if (count == 4) {
							input.className += 'datepicker';	                        
	                    }
	                    
	                    if (count == 5) {
							input.className += 'datepicker';	                        
	                    }
	                    
	                    $(input).appendTo($(column.footer()).empty())
	                    .on('change', function () {
	                        column.search($(this).val(), false, false, true).draw();
	                    });
	                    
	                    $('.datepicker').datepicker({
	                        format: 'yyyy-mm-dd'
	                    });
	                    
                    }
                });
            }",
		];
	}

	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	protected function filename() {
		return 'usersdatatables_' . time();
	}
}
