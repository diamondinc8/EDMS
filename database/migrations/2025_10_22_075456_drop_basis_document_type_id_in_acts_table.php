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
        Schema::table('acts', function (Blueprint $table) {
            $table->dropForeign('act_basis_document_type_fk');
            $table->dropIndex('act_basis_document_type_idx');
            $table->dropColumn('basis_document_type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('acts', function (Blueprint $table) {
            $table->unsignedBigInteger('basis_document_type_id');
            $table->index('basis_document_type_id', 'act_basis_document_type_idx');
            $table->foreign('basis_document_type_id', 'act_basis_document_type_fk')->references('id')->on('document_types');
        });
    }
};
