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
        Schema::create('company_contractors', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('company_id');
            $table->index('company_id', 'company_contractor_idx');
            $table->foreign('company_id', 'fk_company_contractor')->references('id')->on('companies')->onDelete('cascade');

            $table->unsignedBigInteger('company_contractor_id');
            $table->index('company_contractor_id', 'contractor_company_idx');
            $table->foreign('company_contractor_id', 'fk_contractor_company')->references('id')->on('companies')->onDelete('cascade');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_contractors');
    }
};
