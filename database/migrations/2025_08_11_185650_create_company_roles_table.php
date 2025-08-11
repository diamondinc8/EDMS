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
        Schema::create('company_roles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'user_role_idx');
            $table->foreign('user_id', 'user_role_fk')->on('users')->references('id');

            $table->unsignedBigInteger('company_id');
            $table->index('company_id', 'company_user_role_idx');
            $table->foreign('company_id', 'company_user_role_fk')->on('companies')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_roles');
    }
};
