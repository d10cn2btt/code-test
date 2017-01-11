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

// Notes
Breadcrumbs::register('notes.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Notes', route('notes.index'));
});

// Notes > Upload Photo
Breadcrumbs::register('notes.create', function($breadcrumbs)
{
    $breadcrumbs->parent('notes.index');
    $breadcrumbs->push('Create Note', route('notes.create'));
});

// Notes > [Photo Name]
Breadcrumbs::register('notes.show', function($breadcrumbs, $notes)
{
    $breadcrumbs->parent('notes.index');
    $breadcrumbs->push($notes->title, route('notes.show', $notes->id));
});

// Notes > [Photo Name] > Edit Photo
Breadcrumbs::register('notes.edit', function($breadcrumbs, $notes)
{
    $breadcrumbs->parent('notes.show', $notes);
    $breadcrumbs->push('Edit Note', route('notes.edit', $notes->id));
});
