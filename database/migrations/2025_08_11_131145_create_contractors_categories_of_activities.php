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
        Schema::create('contractors_categories_of_activities', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('contractor_id');
            $table->index('contractor_id', 'contractor_category_of_activity_idx');
            $table->foreign('contractor_id', 'contractor_category_of_activity_fk')->on('contractors')->references('id');

            $table->unsignedBigInteger('category_id');
            $table->index('category_id', 'category_of_activity_contractor_idx');
            $table->foreign('category_id', 'category_of_activity_contractor_fk')->on('categories_of_activities')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contractors_categories_of_activities');
    }
};
