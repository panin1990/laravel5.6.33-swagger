<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolesController extends BaseControllerAbstractClass
{
    protected $modelClass = 'App\Models\Permissions\Role';
    protected $validateRules = [
        'create' => [
            'name' => 'required|string',
            'description' => 'required|string'
        ],
        'update' => [
            'name' => 'string',
            'content' => 'json'
        ],
        'attachScope' =>  [
            'role_id' => 'required|exists:roles,id',
            'scopes' => 'required|array',
            'scopes.*' => 'integer|exists:scopes,id'
        ],
        'detachScope' => [
            'role_id' => 'required|exists:roles,id',
            'scopes' => 'required|array',
            'scopes.*' => 'integer'
        ]
    ];

    public function attachScope(Request $request)
    {
        $this->validateRequest($request, __FUNCTION__);
        $role = $this->modelClass::find($request->all()['role_id']);
        $role->scopes()->syncWithoutDetaching($request->all()['scopes']);
        $role = $role->fresh();
        return response()->json($role);
    }

    public function detachScope(Request $request)
    {
        $this->validateRequest($request, __FUNCTION__);
        $role = $this->modelClass::find($request->all()['role_id']);
        $role->scopes()->detach($request->all()['scopes']);
        $role = $role->fresh();
        return response()->json($role);
    }
}