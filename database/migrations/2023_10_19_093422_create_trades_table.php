<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->date('tradeStartDate')->nullable();
            $table->date('tradeEndDate')->nullable();
            $table->string('status');
            $table->foreignId('owner_id')->constrained('users');
            $table->foreignId('offered_item_id')->constrained('items');
            $table->foreignId('requested_item_id')->constrained('items');
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
        Schema::dropIfExists('trades');
    }
};
