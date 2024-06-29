<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('image_masters', function (Blueprint $table) {
            $table->unsignedbiginteger('id');
            $table->unsignedbiginteger('image_master_id')->nullable();
            $table->unsignedbiginteger('product_id')->nullable();
            $table->unsignedbiginteger('status_id')->nullable();
            $table->unsignedbiginteger('category_id')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->text('table_name')->nullable();
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
        Schema::dropIfExists('product_images');
    }
};
