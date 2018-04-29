<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bdates', function (Blueprint $table) {
            $table->increments('id');
            $table->date('bdate');
            $table->enum('basecurrency', ['INR', 'GBP','USD','EUR']);
            $table->enum('conventercurrency', ['GBP', 'INR','USD','EUR']);
            $table->decimal('rate', 5,2);
            $table->tinyInteger('counter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bdates');
    }
}
