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
        Schema::create('contractors', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('company_id');
            $table->index('company_id', 'contractor_company_idx');
            $table->foreign('company_id', 'contractor_company_fk')->on('companies')->references('id');

            $table->unsignedBigInteger('category_of_activity_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contractors');
    }
};
