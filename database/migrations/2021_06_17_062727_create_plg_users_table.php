<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlgUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plg_users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->default('');
            $table->string('surname', 200)->default('');
            $table->string('position', 200)->default('');

            $table
                ->unsignedInteger('company_id')
                ->nullable(true)
                ->default(null);
            $table->index('company_id', 'company_id');

            $table->string('ccode', 200)->default('');
            $table->string('role', 200)->default('');
            $table->string('email', 200)->default('');

            $table
                ->foreign('company_id')
                ->references('id')
                ->on('companies')
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
        Schema::dropIfExists('plg_users');
        Schema::table('plg_users', function(Blueprint $table)
        {
            $table->dropForeign('company_id');
        });

    }
}
