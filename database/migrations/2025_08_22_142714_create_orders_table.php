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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // Номер документа
            $table->unsignedBigInteger('document_number');
            // Дата документа
            $table->date('date');
            // Дата подписания документа со стороны компании-получателя
            $table->date('date_of_signing');
            // Название документа
            $table->string('title');

            // Статус документа, по стандарту "отправлен", дополнительно будет "подписан", "не подписан"
            $table->string('status')->default('Отправлен');

            // Описание документа
            $table->text('content');

            // ID сотрудника, создавшего документа
            $table->unsignedBigInteger('creator_id');
            $table->index('creator_id', 'creator_order_idx');
            $table->foreign('creator_id', 'creator_order_fk')->on('users')->references('id');

            // ID сотрудника, подписавшего этот документ со стороны компании отправителя
            $table->unsignedBigInteger('sender_signer_id');
            $table->index('sender_signer_id', 'sender_signer_order_idx');
            $table->foreign('sender_signer_id', 'sender_signer_order_fk')->on('users')->references('id');

            // ID сотрудника, подписавшего этот документ со стороны компании получателя (в случае если документ отклонен это не появится, просто будет установлен статус)
            $table->unsignedBigInteger('recipient_signer_id');
            $table->index('recipient_signer_id', 'recipient_signer_order_idx');
            $table->foreign('recipient_signer_id', 'recipient_signer_order_fk')->on('users')->references('id');

            // ID компании отправителя
            $table->unsignedBigInteger('company_sender_id');
            $table->index('company_sender_id', 'company_sender_order_idx');
            $table->foreign('company_sender_id', 'company_sender_order_fk')->on('companies')->references('id');

            // ID компании получателя документа
            $table->unsignedBigInteger('recipient_company_id');
            $table->index('recipient_company_id', 'document_recipient_order_idx');
            $table->foreign('recipient_company_id', 'document_recipient_order_fk')->on('companies')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
