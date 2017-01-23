<?php
namespace App\Common\DataTables;

use Yajra\Datatables\Services\DataTable;

abstract class DataTableBase extends DataTable
{
    /**
     * @var array
     * set fix column
     * Example :
     * array(
     *  'leftColumns' =>  2
     * )
     */
    protected $fixedColumns = array();

    /**
     * @var array
     * Example :
     * array(
     *   'name', 'data', 'title'
     * )
     */
    protected $columns = array(
        'created_at' => array(
            'date' => true
        ),
        'updated_at' => array(
            'date' => true
        ),
    );

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
    protected function getBuilderParameters()
    {
        $builder = [
            'order'        =>   [[0, 'desc']],
            'dom'          =>   "<'row'<'col-md-6'l><'col-md-6 text-right'B>><'row'<'col-md-12'tr>><'row'<'col-md-5'i><'col-md-7'p>>",
            'buttons'      =>   $this->buttons,
            'initComplete' => $this->setInitComplete(),
        ];

        if (!empty($this->fixedColumns)) {
            $builder['scrollX'] = true;
            $builder['fixedColumns'] = $this->fixedColumns;
        }

        return $builder;
    }

    protected function setInitComplete()
    {
        ob_start();
        $arBlank     = array('' => '');
        $dataSelect2 = array();

        $columns = $this->getColumns();
        foreach ($columns as $key => $column) {
            if (isset($column['select2']) && is_array($column['select2'])) {
                $listData = $arBlank + $column['select2'];
                $dataSelect2[$column['data']] = \Form::select(
                    $column['data'],
                    $listData,
                    null,
                    array(
                        'class' => 'select2',
                        'style' => 'width: 100%'
                    )
                );
            }
        }
        ?>
        function () {
            var totalColumn = this.api().columns()[0].length;
            var count = 0;
            <?php foreach ($dataSelect2 as $name => $contentSelect2) { ?>
                var <?php echo $this->renameVariable($name) ?> = '<?php echo $contentSelect2 ?>';
            <?php } ?>
            this.api().columns().every(function () {
                var column = this;
                var optData = column.init().columns[count];
                count++;
                //do not filter column action
                if (count < totalColumn) {
                    var input = document.createElement("input");
                    input.style.width = '100%';
                    input.className += 'form-control';

                    if (typeof optData.date != 'undefined' && optData.date == true) {
                        input.className += ' datepicker';
                    } else if (typeof optData.select2 != 'undefined') {
                        var input = eval(optData.data);
                    }

                    $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        var valueSearch = $(this).val();

                        if (valueSearch == null) {
                            valueSearch = '';
                        }

                        valueSearch = valueSearch.trim();
                        column.search(valueSearch, false, false, true).draw();
                    });

                    $('.datepicker').datepicker({
                        format: 'yyyy-mm-dd'
                    });

                    $('.select2').select2({
                        placeholder: "<?php echo trans('admin.ops.search_default'); ?>",
                        allowClear: true,
                    });
                }
            });
        }
        <?php
        $html = ob_get_contents();
        ob_clean();
        ob_end_flush();

        return ($html);
    }

    /**
     * @param $variable
     *
     * @return mixed
     */
    public function renameVariable($variable) {
        $variable = str_replace(' ', '-', $variable); // Replaces all spaces with hyphens.
        $variable = preg_replace('/[^A-Za-z0-9\-]/', '', $variable); // Removes special chars.

        return preg_replace('/-+/', '-', $variable); // Replaces multiple hyphens with single one.
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
                    ->ajax('')
                    ->addAction(['width' => '60px'])
                    ->parameters($this->getBuilderParameters());
    }

    abstract protected function setColumns();

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return array_merge($this->setColumns(), $this->columns);
    }

}