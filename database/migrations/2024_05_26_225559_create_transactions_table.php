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
        
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string("transaction_uuid");
            $table->foreignId("account_id")->constrained("accounts");
            $table->enum("transaction_type", ['credit', 'debit'])->nullable();
            $table->decimal("amount", 15, 2)->nullable();
            $table->decimal("balance_after", 15, 2)->nullable();
            $table->string("description")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
