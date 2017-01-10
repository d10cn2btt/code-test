<?php
namespace App\Common\DataTables;

use Yajra\Datatables\Services\DataTable;

abstract class DataTableBase extends DataTable {

	protected $columns = array();

	protected $buttons = array(
		'create',
		'export',
		'print',
	);

	/**
	 * Get default builder parameters.
	 *
	 * @return array
	 */
	protected function getBuilderParameters() {
		return [
			'order'        => [ [ 0, 'desc' ] ],
			'dom'          => "<'row'<'col-md-6'l><'col-md-6 text-right'B>><'row'<'col-md-12'tr>><'row'<'col-md-5'i><'col-md-7'p>>",
			'buttons'      => [
				'create',
				'export',
				'print',
			],
			'initComplete' => "function () {
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement(\"input\");
                    input.style.width = '100%';
                    input.className += 'form-control';
                    $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
                });
            }",
		];
	}

	/**
	 * Optional method if you want to use html builder.
	 *
	 * @return \Yajra\Datatables\Html\Builder
	 */
	public function html() {
		return $this->builder()
		            ->columns( $this->getColumns() )
		            ->ajax( '' )
		            ->addAction( [ 'width' => '60px' ] )
		            ->parameters( $this->getBuilderParameters() );
	}

	/**
	 * Get columns.
	 *
	 * @return array
	 */
	protected function getColumns() {
		return $this->columns;
	}

}