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
            $table->uuid("user_id");
            $table
                ->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onUpdate("CASCADE")
                ->onDelete("CASCADE");
            $table->uuid("book_id");
            $table
                ->foreign("book_id")
                ->references("id")
                ->on("books")
                ->onUpdate("CASCADE")
                ->onDelete("CASCADE");
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
        Schema::dropIfExists('loans');
    }
};
