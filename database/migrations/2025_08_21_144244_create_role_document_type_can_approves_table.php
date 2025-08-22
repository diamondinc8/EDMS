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
        Schema::create('role_document_type_can_approves', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('role_id');
            $table->index('role_id', 'role_document_idx');
            $table->foreign('role_id', 'role_document_fk')->on('roles')->references('id');

            $table->unsignedBigInteger('document_type_id');
            $table->index('document_type_id', 'type_role_document_idx');
            $table->foreign('document_type_id', 'type_role_document_fk')->on('document_types')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_document_type_can_approves');
    }
};
