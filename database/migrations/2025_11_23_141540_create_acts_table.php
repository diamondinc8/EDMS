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
        Schema::create('acts', function (Blueprint $table) {
            $table->id();

            // Компания-отправитель.
            $table->unsignedBigInteger('company_sender_id');
            $table->index('company_sender_id', 'sender_company_idx');
            $table->foreign('company_sender_id', 'sender_company_fk')->on('companies')->references('id');

            // Создатель документа.
            $table->unsignedBigInteger('user_sender_id');
            $table->index('user_sender_id', 'sender_user_idx');
            $table->foreign('user_sender_id', 'sender_user_fk')->on('users')->references('id');

            // Получатель документа.
            $table->unsignedBigInteger('recipient_company_id');
            $table->index('recipient_company_id', 'company_recipient_idx');
            $table->foreign('recipient_company_id', 'company_recipient_fk')->on('companies')->references('id');

            // Номер документа.
            $table->unsignedBigInteger('document_number');
            // Заголовок
            $table->string('title');
            // Дата.
            $table->date('date');
            // Сумма
            $table->decimal('amount', 8, 2);
            // Описание
            $table->text('content')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acts');
    }
};
