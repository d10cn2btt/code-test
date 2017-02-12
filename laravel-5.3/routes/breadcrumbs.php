<?php
/**
 * Created by PhpStorm.
 * User: d10cn
 * Date: 11-Jan-17
 * Time: 17:03
 */

Breadcrumbs::register('home', function ($breadcrumds) {
    $breadcrumds->push('Home', route('home'));
});

Breadcrumbs::register('notes.show', function ($breadcrumbs, $note) {
    $breadcrumbs->parent('notes.index');
    $breadcrumbs->push($note->title, route('notes.show', $note->id));
});

Breadcrumbs::register('sort.cate', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Sort', route('sort.cate'));
});

$listRoute = array(
    'notes',
    'user'
);

foreach ($listRoute as $route) {
    Breadcrumbs::register($route . '.index', function ($breadcrumbs) use ($route) {
        $breadcrumbs->parent('home');
        $breadcrumbs->push(trans('admin.'.$route.'.pages.index'), route($route. '.index'));
    });

    Breadcrumbs::register($route . '.create', function ($breadcrumbs) use ($route) {
        $breadcrumbs->parent($route . '.index');
        $breadcrumbs->push(trans('admin.' . $route . '.pages.create'), route($route . '.create'));
    });

    Breadcrumbs::register($route . '.edit', function ($breadcrumbs, $id) use ($route) {
        $breadcrumbs->parent($route . '.show', $id);
        $breadcrumbs->push(trans('admin.' . $route . '.pages.edit'), route('notes.edit', $id));
    });
}
