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
        Schema::create('kycs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->string("govt_id_url")->nullable();
            $table->string("nin")->nullable();
            $table->string("verification_type")->nullable();
            $table->string("request_type")->nullable();
            $table->string("status")->nullable();
            $table->string("remark")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kycs');
    }
};
