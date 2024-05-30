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
    
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->string("transfer_uuid");
            $table->foreignId("from_account_id")->constrained("accounts");
            $table->foreignId("to_account_id")->constrained("accounts");
            $table->decimal("amount", 15, 2)->nullable();
            $table->enum("transfer_type", ["internal", "external"])->nullable();
            $table->enum("status", ['pending', 'completed', 'failed'])->nullable();
            $table->string("reference")->nullable();
            $table->string("description")->nullable();
            $table->timestamps();
            $table->timestamp("completed_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
