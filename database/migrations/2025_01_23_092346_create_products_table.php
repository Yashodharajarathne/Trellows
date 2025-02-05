<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('Brand')->nullable();
            $table->string('Product name')->nullable();
            $table->string('image')->nullable();
            $table->string('catagory')->nullable();
            $table->string('Quantity')->nullable();
            $table->string('Cost price')->nullable();
            $table->string('Sell Price')->nullable();
            $table->string('Description')->nullable();
            $table->string('Rating')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
