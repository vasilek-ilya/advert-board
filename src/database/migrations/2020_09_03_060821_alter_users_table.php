<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email_verified_at');
            $table->dropColumn('remember_token');
            $table->dropColumn('updated_at');
            $table->dropColumn('created_at');

            $table->string('avatar')->nullable();
            $table->text('about')->nullable();
            $table->string('phone', 10)->nullable();
            $table->timestamp('reg_date')->nullable();
            $table->bigInteger('city_id');
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
            $table->dropColumn('avatar');
            $table->dropColumn('about');
            $table->dropColumn('phone');
            $table->dropColumn('reg_date');
            $table->dropColumn('city_id');

            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
        });
    }
}
