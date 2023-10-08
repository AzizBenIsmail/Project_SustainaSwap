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
            $table->date('proposalDate');
            $table->string('status');
            $table->foreignId('owner')->constrained('users');
        
            $table->timestamps();

            // Ajoutez des contraintes de clé étrangère si nécessaire
            $table->foreign('owner')->references('id')->on('users');
            $table->foreign('offeredItem')->references('id')->on('items');
            $table->foreign('requestedItem')->references('id')->on('items');
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
