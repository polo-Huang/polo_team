<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('status')->default('pending');
            $table->string('role')->nullable();
            $table->boolean('is_admin')->default(0);
            $table->string('homepage_title')->nullable();
            $table->string('cover_photo')->nullable();
            $table->text('introduce')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
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
            $table->dropColumn('status', 'role', 'is_admin', 'homepage_title', 'cover_photo', 'introduce', 'contact_phone', 'contact_email');
        });
    }
}
