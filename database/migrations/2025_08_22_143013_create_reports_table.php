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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();

            // Номер отчета
            $table->unsignedBigInteger('document_number');
            // Дата составления отчета
            $table->date('date');
            // ID создателя отчета
            $table->unsignedBigInteger('creator_id');
            $table->index('creator_id', 'creator_report_idx');
            $table->foreign('creator_id', 'creator_report_fk')->on('users')->references('id');
            // Промежуток от начала и до конца, указанный в отчете
            $table->date('date_start');
            $table->date('date_end');

            // Оглавление отчета и содержание
            $table->string('title');
            $table->text('content');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
