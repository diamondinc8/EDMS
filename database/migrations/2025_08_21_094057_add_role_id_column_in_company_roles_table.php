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
        Schema::table('company_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->index('role_id', 'company_role_idx');
            $table->foreign('role_id', 'company_role_fk')->on('roles')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_roles', function (Blueprint $table) {
            $table->dropColumn('role_id');
        });
    }
};
