<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_types', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('value');
        });

        DB::table('user_types')->insert([
            [
                'key' => 'admin',
                'value' => 'Admin',
            ],
            [
                'key' => 'user',
                'value' => 'User',
            ],
            [
                'key' => 'pro_user',
                'value' => 'Pro User',
            ],
        ]);

        Schema::create('signup_users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('mobile_number')->unique();
            $table->string('location');
            $table->string('user_type');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signup_users');
    }
};
