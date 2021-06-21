<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('');
            $table->string('email')->unique()->default('');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->string('surname')->default('');

            $table
                ->unsignedInteger('company_id')
                ->index('company_id')
                ->nullable(true)
                ->default(null);

            $table
                ->unsignedInteger('role_id')
                ->index('role_id')
                ->nullable(true)
                ->default(null);

            // foreign keys
            $table
                ->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table
                ->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');

        Schema::table('users', function(Blueprint $table)
        {
            $table->dropForeign('company_id');
            $table->dropForeign('role_id');
        });
    }
}
