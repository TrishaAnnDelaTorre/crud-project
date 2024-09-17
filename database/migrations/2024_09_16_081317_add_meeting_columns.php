<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
   public function up()
{
    Schema::table('meetings', function (Blueprint $table) {
        $table->string('title');
        $table->text('description');
        $table->date('meeting_date');
    });
}

public function down()
{
    Schema::table('meetings', function (Blueprint $table) {
        $table->dropColumn(['title', 'description', 'meeting_date']);
    });
}
};
