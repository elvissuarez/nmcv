<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesCrurrentStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices_crurrent_states', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cstate', 200);
            $table->string('csip', 50);
            $table->unsignedBigInteger('csoffice');
            $table->boolean('csactive')->default(true);
            $table->timestamps();
            // foreign Key
            $table->foreign('csoffice')
                ->references('ocode')
                ->on('offices')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offices_crurrent_states');
    }
}
