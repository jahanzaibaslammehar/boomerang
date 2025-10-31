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
        Schema::create('customer_trade', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('trade_vin');
            $table->string('scc_account_number')->nullable();
            $table->float('payoff_amount')->nullable();
            $table->float('per_diem')->nullable();
            $table->timestamp('date_20_days_payoff')->nullable();
            $table->unsignedBigInteger('trade_lender_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_trade');
    }
};
