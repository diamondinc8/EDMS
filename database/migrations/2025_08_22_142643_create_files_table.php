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
        Schema::create('files', function (Blueprint $table) {
            $table->id();

            // Путь до файла
            $table->string('path_to_file');
            // Имя файла
            $table->string('name_of_file');
            // Тип файла
            $table->string('type_of_file');

            // Тип документа, к которому относится этот файл
            $table->unsignedBigInteger('document_type_id');
            $table->index('document_type_id', 'file_document_type_idx');
            $table->foreign('document_type_id', 'file_document_type_fk')->on('document_types')->references('id');

            // ID документа, к которому относится этот файл
            $table->unsignedBigInteger('document_id_in_category');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
