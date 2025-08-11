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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description');

            $table->unsignedBigInteger('type_id');
            $table->index('type_id', 'document_type_idx');
            $table->foreign('type_id', 'document_type_fk')->on('document_types')->references('id');

            $table->string('status')->default('Отправлен');

            $table->file('file');

            $table->unsignedBigInteger('sender_id');
            $table->index('sender_id', 'sender_document_idx');
            $table->foreign('sender_id', 'sender_document_fk')->on('users')->references('id');

            $table->unsignedBigInteger('recipient_company_id');
            $table->index('recipient_company_id', 'document_recipient_company_idx');
            $table->foreign('recipient_company_id', 'document_recipient_company_fk')->on('companies')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
