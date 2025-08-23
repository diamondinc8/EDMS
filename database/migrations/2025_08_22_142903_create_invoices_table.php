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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            // Номер документа
            $table->unsignedBigInteger('document_number');
            // Дата, указанная в документе
            $table->date('date');
            // Дата подписания документа со стороны компании-получателя
            $table->date('date_of_signing');
            
            $table->string('title');
            // Статус документа
            $table->string('status')->default('Отправлен');

            // Описание документа
            $table->text('content');

            // Сумма, указанная в документе
            $table->float('amount');

            // ID типа документа, на котором основывается этот счет
            $table->unsignedBigInteger('basis_document_type_id');
            $table->index('basis_document_type_id', 'invoices_basis_document_type_idx');
            $table->foreign('basis_document_type_id', 'invoices_basis_document_type_fk')->on('document_types')->references('id');

            // ID документа, на котором основывается этот счет (заявка/договор)
            $table->unsignedBigInteger('basis_document_id');

            // ID сотрудника, который создал этот документ
            $table->unsignedBigInteger('creator_id');
            $table->index('creator_id', 'creator_invoices_idx');
            $table->foreign('creator_id', 'creator_invoices_fk')->on('users')->references('id');

            // ID сотрудника, который подписал этот документ со стороны компании-отправителя
            $table->unsignedBigInteger('sender_signer_id');
            $table->index('sender_signer_id', 'sender_signer_invoices_idx');
            $table->foreign('sender_signer_id', 'sender_signer_invoices_fk')->on('users')->references('id');

            // ID сотрудника, который подписал этот документ со стороны компании-получателя
            $table->unsignedBigInteger('recipient_signer_id');
            $table->index('recipient_signer_id', 'recipient_signer_invoices_idx');
            $table->foreign('recipient_signer_id', 'recipient_signer_invoices_fk')->on('users')->references('id');

            // Компания-отправитель
            $table->unsignedBigInteger('company_sender_id');
            $table->index('company_sender_id', 'company_sender_invoices_idx');
            $table->foreign('company_sender_id', 'company_sender_invoices_fk')->on('companies')->references('id');

            // Компания-получатель
            $table->unsignedBigInteger('recipient_company_id');
            $table->index('recipient_company_id', 'invoices_recipient_company_idx');
            $table->foreign('recipient_company_id', 'invoices_recipient_company_fk')->on('companies')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
