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

$listRoute = array(
    'note' => array(
        'title' => 'Note',
        'route' => 'notes',
    ),
    'user' => array(
        'title' => 'User',
        'route' => 'user',
    ),
);

foreach ($listRoute as $route) {
    // Notes
    Breadcrumbs::register($route['route'] . '.index', function ($breadcrumbs) use ($route) {
        $breadcrumbs->parent('home');
        $breadcrumbs->push($route['title'], route($route['route'] . '.index'));
    });

    // Notes > Upload Photo
    Breadcrumbs::register($route['route']. '.create', function ($breadcrumbs) use ($route) {
        $breadcrumbs->parent($route['route'] . '.index');
        $breadcrumbs->push('Create ' . $route['title'], route($route['route'] . '.create'));
    });

    // Notes > [Photo Name]
//    Breadcrumbs::register('notes.show', function ($breadcrumbs, $notes) {
//        $breadcrumbs->parent('notes.index');
//        $breadcrumbs->push($notes->title, route('notes.show', $notes->id));
//    });
//
//    // Notes > [Photo Name] > Edit Photo
//    Breadcrumbs::register('notes.edit', function ($breadcrumbs, $notes) {
//        $breadcrumbs->parent('notes.show', $notes);
//        $breadcrumbs->push('Edit Note', route('notes.edit', $notes->id));
//    });

}