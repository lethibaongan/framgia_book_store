<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {  
            $table->string('name', 50)->change();
            $table->string('email', 50)->change();
            $table->string('password', 50)->change();
            $table->string('username', 50)->after('name');
            $table->date('date_of_birth')->after('password');
            $table->string('address', 100)->after('date_of_birth');
            $table->integer('permison')->after('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->change();
            $table->string('email')->change();
            $table->string('password')->change();
            $table->dropColumn(['username', 'date_of_birth', 'address', 'permision']); 
        });
    }
}
