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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->integer('tipo_id');
            $table->string('img');
            $table->decimal('price',11,2);
            $table->integer('stock');
            $table->integer('stock_min');
            $table->integer('stock_max');
            $table->string('description');
            $table->string('content')->nullable();
            $table->softDeletes();
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
