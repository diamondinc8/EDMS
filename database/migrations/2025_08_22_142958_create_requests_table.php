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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();

            // Номер заявки  
            $table->unsignedBigInteger('document_number');
            // Дата заявки
            $table->date('date');
            // Дата подписания документа со стороны компании-получателя
            $table->date('date_of_signing');
            // Название документа
            $table->string('title');
            // Статус документа
            $table->string('status')->default('Отправлен');
            // Описание документа
            $table->text('content');
            // ID создателя документа
            $table->unsignedBigInteger('creator_id');
            $table->index('creator_id', 'creator_request_idx');
            $table->foreign('creator_id', 'creator_request_fk')->on('users')->references('id');

            // ID сотрудника, который подписал этот документ со стороны компании-отправителя
            $table->unsignedBigInteger('sender_signer_id');
            $table->index('sender_signer_id', 'sender_signer_request_idx');
            $table->foreign('sender_signer_id', 'sender_signer_request_fk')->on('users')->references('id');

            // ID сотрудника, который подписал этот документ со стороны компании-получателя
            $table->unsignedBigInteger('recipient_signer_id');
            $table->index('recipient_signer_id', 'recipient_signer_request_idx');
            $table->foreign('recipient_signer_id', 'recipient_signer_request_fk')->on('users')->references('id');

            // Компания-отправитель
            $table->unsignedBigInteger('company_sender_id');
            $table->index('company_sender_id', 'company_sender_request_idx');
            $table->foreign('company_sender_id', 'company_sender_request_fk')->on('companies')->references('id');

            // Компания-получатель
            $table->unsignedBigInteger('recipient_company_id');
            $table->index('recipient_company_id', 'request_recipient_company_idx');
            $table->foreign('recipient_company_id', 'request_recipient_company_fk')->on('companies')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
