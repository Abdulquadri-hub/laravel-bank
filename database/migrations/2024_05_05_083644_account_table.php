<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create("accounts", function(Blueprint $table){
            //
            $table->id();
            $table->string("account_uuid");
            $table->foreignId("user_id");
            $table->string("account_number", 10);
            $table->enum("account_type", ["savings", "current", "joint"])->default("savings");
            $table->decimal("account_balance", 15, 2)->defualt("0.00");
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
