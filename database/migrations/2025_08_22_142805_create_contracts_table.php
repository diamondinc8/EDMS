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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();

            // Номер документа 
            $table->unsignedBigInteger('document_number');
            // Дата подписания документа со стороны компании-получателя
            $table->date('date_of_signing');
            // Дата окончания действия документа
            $table->date('end_date');
            // Название документа
            $table->string('title');
            // Статус документа
            $table->string('status')->default('Отправлен');
            // Описание документа
            $table->text('content');
            // Сумма, указанная в документе (если необходимо)
            $table->float('amount');

            // ID пользователя, создавшего документ со стороны компании-отправителя
            $table->unsignedBigInteger('creator_id');
            $table->index('creator_id', 'creator_order_idx');
            $table->foreign('creator_id', 'creator_order_fk')->on('users')->references('id');
            // ID сотрудника, который подписал этот документ со стороны компании-отправителя
            $table->unsignedBigInteger('sender_signer_id');
            $table->index('sender_signer_id', 'sender_signer_order_idx');
            $table->foreign('sender_signer_id', 'sender_signer_order_fk')->on('users')->references('id');

            // ID сотрудника, который подписал этот документ со стороны компании-получателя
            $table->unsignedBigInteger('recipient_signer_id');
            $table->index('recipient_signer_id', 'recipient_signer_order_idx');
            $table->foreign('recipient_signer_id', 'recipient_signer_order_fk')->on('users')->references('id');

            // ID компании-отправителя
            $table->unsignedBigInteger('company_sender_id');
            $table->index('company_sender_id', 'company_sender_order_idx');
            $table->foreign('company_sender_id', 'company_sender_order_fk')->on('companies')->references('id');
            // ID компании-получателя
            $table->unsignedBigInteger('recipient_company_id');
            $table->index('recipient_company_id', 'order_recipient_company_idx');
            $table->foreign('recipient_company_id', 'order_recipient_company_fk')->on('companies')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
