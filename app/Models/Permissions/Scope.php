<?php

namespace App\Models\Permissions;

use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
    protected $table = 'scopes';
    protected $fillable = ['name', 'description'];
    protected $hidden = ['created_at', 'updated_at'];

    public function users() {
        return $this->belongsToMany('App\User');
    }
}
