<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigincrements('expenses_id');
            $table->string('exp_img');
            $table->string('expenses_name', 255);
            $table->unsignedbiginteger('type_id');
            $table->integer('quantity');
            $table->integer('expenses_price');
            $table->date('expenses_date');
            $table->timestamps();

 $table->foreign('type_id')->references('type_id')->on('types')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
