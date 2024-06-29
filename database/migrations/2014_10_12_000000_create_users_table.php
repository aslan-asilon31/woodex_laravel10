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
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedbiginteger('id');
            $table->unsignedbiginteger('user_id')->nullable();
            $table->unsignedbiginteger('status_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('image', 2048)->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->date('date_bird')->nullable();
            $table->string('place_bird')->nullable();
            $table->string('gender')->nullable();
            $table->string('role')->nullable();
            $table->string('department')->nullable();
            $table->string('section')->nullable();
            $table->string('phone')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('is_active')->nullable();
            $table->string('last_seen')->nullable();
            $table->string('wishlist')->nullable();
            $table->string('desc')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('post_code')->nullable();
            $table->string('social_x')->nullable();
            $table->string('social_fb')->nullable();
            $table->string('social_ig')->nullable();
            $table->string('social_github')->nullable();
            $table->string('website')->nullable();
            $table->string('language')->nullable();
            $table->string('created_by')->default();
            $table->string('updated_by')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
