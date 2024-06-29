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
        Schema::create('price_masters', function (Blueprint $table) {
            $table->unsignedbiginteger('id');
            $table->unsignedbiginteger('price_master_id')->nullable();
            $table->unsignedbiginteger('product_id')->nullable();
            $table->unsignedbiginteger('status_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('price_before')->nullable();
            $table->integer('price_after')->nullable();
            $table->string('currency')->nullable();
            $table->integer('discount')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('lang')->default('en');
            $table->unsignedbiginteger('lang_id')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_masters');
    }
};
