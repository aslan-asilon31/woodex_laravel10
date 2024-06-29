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
        Schema::create('category_masters', function (Blueprint $table) {
            $table->unsignedbiginteger('id');
            $table->unsignedbiginteger('category_master_id')->nullable();
            $table->string('cat_type_sub')->nullable(); //initialize if this is category or sub category main cat (1) sub cat (2) subsub cat(3)
            $table->string('cat_sub_from')->nullable(); // sub cat from category 
            $table->unsignedbiginteger('status_id')->nullable();
            $table->string('image_banner')->nullable();
            $table->string('name')->nullable();
            $table->string('desc')->nullable();
            $table->string('desc_cat_type_sub')->nullable(); //desc initialize if this is category or sub category
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
        Schema::dropIfExists('categories');
    }
};
