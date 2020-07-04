<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysForProvidersOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'office_provider', function (Blueprint $table) {
                $table->foreign('office_ocode')->references('ocode')->on('offices')->onDelete('cascade');
                $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'office_provider', function (Blueprint $table) {
                $table->dropForeign('office_provider_office_ocode_foreign');
                $table->dropForeign('office_provider_provider_id_foreign');
            }
        );
    }
}
