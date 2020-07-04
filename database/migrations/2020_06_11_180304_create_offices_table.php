<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'offices', function (Blueprint $table) {
                $table->id('ocode');
                $table->string('oname', 200);
                $table->string('ocity', 200);
                $table->string('ostate', 200);
                $table->string('ocontact', 200);
                $table->string('ophone', 200);
                $table->string('oemail', 200);
                $table->string('oaddress', 500);
                $table->bigInteger('olatitude')->nullable();
                $table->bigInteger('olongitude')->nullable();
                $table->string('oopening', 500);
                $table->string('oip', 50);
                $table->string('ochannel');
                $table->boolean('oactive')->default(true);
                $table->timestamps();
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
        Schema::dropIfExists('offices');
    }
}
