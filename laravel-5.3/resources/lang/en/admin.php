<?php
/**
 * Created by PhpStorm.
 * User: d10cn
 * Date: 11-Jan-17
 * Time: 16:40
 */

return array(
    'common' => array(
        'fields' => array(
            'id' => 'ID',
            'deleted_at' => 'Deleted At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ),
    ),

    'notes' => array(
        'title' => 'Note Management',
        'fields' => array(
            'title' => 'Title',
            'body' => 'Body',
            'status' => 'Status',
            'created_by' => 'Created By',
            'status_deactive' => 'Deactive',
            'status_draw' => 'Draw',
            'status_active' => 'Active',
        ),
        'pages' => array(
            'index' => 'List Notes',
            'create' => 'Create Note',
            'show' => 'Note Detail',
            'update' => 'Edit Note',
        ),
    ),
    'users' => array(
        'title' => 'User Management',
        'fields' => array(
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'remember_token' => 'Remember Token',
        ),
        'pages' => array(
            'index' => 'List Users',
            'create' => 'Create User',
            'show' => 'Note User',
            'update' => 'Edit User',
        ),
    ),
);