<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->text('message')
                ->nullable();
            $table->date('from')
                ->useCurrent();
            $table->date('to');
            $table->integer('adults')
                ->unsigned()
                ->default(1);
            $table->integer('children')
                ->unsigned()
                ->default(0);
            $table->integer('infants')
                ->unsigned()
                ->default(0);
            $table->integer('price')
                ->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquiries');
    }
}
