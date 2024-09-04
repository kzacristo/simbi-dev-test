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
        Schema::create('loans', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid('user_id');
            $table->foreignUuid('book_id');
            $table->date('loan_date');
            $table->date('return_date')->nullable();
            $table->enum('status', ['loaned', 'returned'])->default('loaned');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
