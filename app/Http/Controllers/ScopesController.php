<?php

namespace App\Http\Controllers;


class ScopesController extends BaseControllerAbstractClass
{
    protected $modelClass = 'App\Models\Permissions\Scope';
    protected $validateRules = [
        'create' => [
            'name' => 'required|string',
            'description' => 'required|string'
        ],
        'update' => [
            'name' => 'string',
            'content' => 'json'
        ]
    ];
}