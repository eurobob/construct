<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdditionalUserInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('first_name')->after('id');
            $table->string('last_name')->after('id');
            $table->string('slug')->after('last_name');
            $table->string('biography')->after('password');
            $table->string('phone_number')->after('biography');
            $table->string('skype')->after('phone_number');
            $table->string('facebook')->after('skype');
            $table->string('twitter')->after('facebook');
            $table->string('linkedin')->after('twitter');
            $table->string('birthday')->after('linkedin');
            $table->string('location')->after('birthday');
            $table->string('start_date')->after('location');
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
            $table->string('name')->after('id');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('slug');
            $table->dropColumn('biography');
            $table->dropColumn('phone_number');
            $table->dropColumn('skype');
            $table->dropColumn('facebook');
            $table->dropColumn('twitter');
            $table->dropColumn('linkedin');
            $table->dropColumn('birthday');
            $table->dropColumn('location');
            $table->dropColumn('start_date');
        });
    }
}
