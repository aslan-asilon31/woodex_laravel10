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
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedbiginteger('id');
            $table->unsignedbiginteger('transaction_id')->nullable();
            $table->unsignedbiginteger('user_id')->nullable();
            $table->unsignedbiginteger('status_id')->nullable();
            $table->unsignedbiginteger('category_id')->nullable();
            $table->unsignedbiginteger('price_id')->nullable();
            $table->unsignedbiginteger('brand_id')->nullable();
            $table->unsignedbiginteger('shipping_id')->nullable();
            $table->unsignedbiginteger('product_id')->nullable();
            $table->string('snap_token', 36)->nullable();
            $table->string('payment_method')->nullable();
            $table->string('invoice_code')->nullable();
            $table->integer('prod_amount')->nullable();
            $table->integer('total_price')->nullable();
            $table->integer('gross_total_price')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
