<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTableAndEditSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('roles');
        Schema::dropIfExists('scopes');
        Schema::dropIfExists('role_scope');
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('scope_user');

        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('scopes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('role_scope', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('scope_id');
            $table->integer('role_id');
            $table->timestamps();
        });

        Schema::create('role_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('role_id');
            $table->timestamps();
        });

        Schema::create('scope_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('scope_id');
            $table->timestamps();
        });


        if (!Schema::hasColumn('sections', 'status')) {
            Schema::table('sections', function(Blueprint $table) {
                var_dump($table); die;
                $table->string('status');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('scopes');
        Schema::dropIfExists('rolesScopes');
        Schema::dropIfExists('userRole');
        Schema::dropIfExists('userAdditionalScopes');
    }
}
