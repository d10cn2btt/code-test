<?php
/**
 * Created by PhpStorm.
 * User: d10cn
 * Date: 05-Jan-17
 * Time: 17:29
 */
if (!function_exists('render_column_action')) {
    /**
     * @param $model
     * @param bool $btnView
     * @param bool $btnEdit
     * @param bool $btnDelete
     * @return string
     */
    function render_column_action($model, $btnView = true, $btnEdit = true, $btnDelete = true)
    {
        $route = Route::getCurrentRoute()->getPath();
        $tmpAr = explode('-', $route);
        $currentRoute = $tmpAr[0];
        $btnReturn = "";
        if ($btnView) {
            $btnReturn .= '<a href="' . route($currentRoute.'.show', $model->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a> ';
        }

        if ($btnEdit) {
            $btnReturn .= '<a href="' . route($currentRoute.'.edit', $model->id) . '" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a> ';
        }

        if ($btnDelete) {
            $btnReturn .= '<a url-delete="' . route($currentRoute.'.destroy', $model->id)."|". $model->id . '" class="btn btn-xs btn-danger btn-delete-row-dttb""><i class="fa fa-trash"></i></a>';
        }

        return $btnReturn;
    }

    if (!function_exists('show_content_ck')) {
        /**
         * Show content with Ckeditor.
         *
         * @param $content
         * @param int $limit
         * @return string
         */
        function show_content_ck($content, $limit = 50)
        {
            $body = strip_tags($content);
            if (mb_strlen($body) > $limit) {
                return mb_substr($body, 0, $limit) . '...';
            }
            return $body;
        }
    }
}
