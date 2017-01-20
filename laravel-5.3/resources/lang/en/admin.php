<?php
/**
 * Created by PhpStorm.
 * User: d10cn
 * Date: 11-Jan-17
 * Time: 16:40
 */

return array(
    'ops' => array(
        'search_default' => 'Please select'
    ),
    'msg' => array(
        'create' => array(
            'fail' => 'Create Fail',
            'success' => 'Create Succesfully'
        ),
        'update' => array(
            'fail' => 'Update Fail',
            'success' => 'Update Succesfully'
        ),
        'delete' => array(
            'fail' => 'Delete Fail',
            'success' => 'Delete Succesfully'
        ),
        '404' => 'Page Not Found',
    ),

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
            'id' => 'ID',
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
            'edit' => 'Edit Note',
        ),
    ),
    'user' => array(
        'title' => 'User Management',
        'fields' => array(
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'remember_token' => 'Remember Token',
        ),
        'pages' => array(
            'index' => 'List Users',
            'create' => 'Create User',
            'show' => 'Note User',
            'edit' => 'Edit User',
        ),
    ),
);