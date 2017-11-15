<?php

use Illuminate\Database\Migrations\Migration;

class AddVoyagerUserFields extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('admins', function ($table) {
            if (!Schema::hasColumn('admins', 'avatar')) {
                $table->string('avatar')->nullable()->after('email')->default('users/default.png');
            }
            $table->integer('role_id')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        if (Schema::hasColumn('admins', 'avatar')) {
            Schema::table('admins', function ($table) {
                $table->dropColumn('avatar');
            });
        }
        if (Schema::hasColumn('admins', 'role_id')) {
            Schema::table('admins', function ($table) {
                $table->dropColumn('role_id');
            });
        }
    }
}
