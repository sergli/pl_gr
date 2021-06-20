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
            $table->increments('id');

            $table
                ->unsignedInteger('company_id')
                ->index('company_id')
                ->nullable(true)
                ->default(null);

            $table->string('name')->default('');
            $table->string('surname')->default('');

            $table
                ->unsignedInteger('country_id')
                ->index('country_id')
                ->nullable(false);

            $table->timestamp('regdate')->useCurrentOnUpdate()->useCurrent();
            $table->date('regenddate')->nullable(true)->default(null);

            $table->unsignedInteger('patentserie')->nullable(false);
            $table->unsignedInteger('patentnumber')->nullable(false);

            $table->date('patentdate')->nullable(true)->default(null);
            $table->date('patentenddate')->nullable(true)->default(null);
            $table->date('patentnextpaydate')->nullable(true)->default(null);

            $table->unsignedInteger('polisnumber')->nullable(true)->default(null);
            $table->string('poliscompany')->default('');

            $table->date('polisdate')->nullable(true)->default(null);
            $table->date('polisenddate')->nullable(true)->default(null);
            $table->date('dateoutwork')->nullable(true)->default(null);
            $table->date('dateinwork')->nullable(true)->default(null);

            $table->timestamps();

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

        Schema::table('foreigners', function(Blueprint $table)
        {
            $table->dropForeign('company_id');
        });
    }
}
