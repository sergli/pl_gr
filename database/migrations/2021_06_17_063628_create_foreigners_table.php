<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foreigners', function (Blueprint $table) {
            $table->id();

            $table
                ->unsignedInteger('company_id')
                ->nullable(true)
                ->default(null);
            $table->index('company_id', 'company_id');

            $table->string('ccode', 200)->nullable(false)->default('');
            $table->string('surname', 200)->nullable(false)->default('');
            $table->string('name', 200)->nullable(false)->default('');

            $table->unsignedInteger('country_id')->nullable(false);
            $table->timestamp('regdate')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('regenddate')->nullable(true)->default(null);

            $table->unsignedInteger('patentserie')->nullable(false);
            $table->unsignedInteger('patentnumber')->nullable(false);
            $table->timestamp('patentdate')->nullable(true)->default(null);
            $table->timestamp('patentenddate')->nullable(true)->default(null);
            $table->timestamp('patentnextpaydate')->nullable(true)->default(null);

            $table->unsignedInteger('polisnumber')->nullable(false);
            $table->string('poliscompany', 200)->nullable(false)->default('');

            $table->timestamp('polisdate')->nullable(true)->default(null);
            $table->timestamp('polisenddate')->nullable(true)->default(null);
            $table->timestamp('dateoutwork')->nullable(true)->default(null);
            $table->timestamp('dateinwork')->nullable(true)->default(null);

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
        Schema::dropIfExists('foreigners');
    }
}
