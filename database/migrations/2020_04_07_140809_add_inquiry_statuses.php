<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInquiryStatuses extends Migration
{
    public function up()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->boolean('is_verified')->default(0);
            $table->boolean('is_approved')->default(0);
        });
    }

    public function down()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropColumn(['is_verified', 'is_approved']);
        });
    }
}
