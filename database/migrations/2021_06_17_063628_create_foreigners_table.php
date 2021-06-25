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

            $table->string('name')->default('');
            $table->string('surname')->default('');

            $table->timestamp('regdate')->useCurrentOnUpdate()->useCurrent();

            $table->string('patentserie', 20)->nullable(true)->default(null);
            $table->unsignedInteger('patentnumber')->nullable(true)->default(null);

            $table->unsignedInteger('polisnumber')->nullable(true)->default(null);
            $table->string('poliscompany')->nullable(true)->default('');

            $table->timestamps();

            // foreign keys
            $table
                ->foreignId('company_id')->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table
                ->foreignId('country_id')->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table
                ->foreignId('position_id')->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $this->addDatesToTable($table);
        });
    }

    protected function addDatesToTable(Blueprint $table) : void
    {
        $table->date('regenddate')->nullable(true)->default(null);

        $table->date('patentdate')->nullable(true)->default(null);
        $table->date('patentenddate')->nullable(true)->default(null);
        $table->date('patentnextpaydate')->nullable(true)->default(null);

        $table->date('polisdate')->nullable(true)->default(null);
        $table->date('polisenddate')->nullable(true)->default(null);

        $table->date('dateoutwork')->nullable(true)->default(null);
        $table->date('dateinwork')->nullable(true)->default(null);
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
            $table->dropForeign('country_id');
            $table->dropForeign('position_id');
        });
    }
}
