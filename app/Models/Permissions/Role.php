<?php

namespace App\Models\Permissions;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name', 'description'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $with = ['scopes'];

    public function users() {
        return $this->belongsToMany('App\User');
    }

    public function scopes() {
        return $this->belongsToMany('App\Models\Permissions\Scope');
    }
}
