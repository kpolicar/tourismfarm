<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInquiryAccommodation extends Migration
{
    public function up()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->integer('accommodation_id')
                ->nullable();
            $table->foreign('accommodation_id')
                ->references('id')
                ->on('accommodations')
                ->onDelete('set null');;
        });
    }

    public function down()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropColumn('accommodation_id');
        });
    }
}
