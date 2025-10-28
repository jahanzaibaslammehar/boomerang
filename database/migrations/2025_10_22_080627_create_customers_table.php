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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('vehicle')->nullable();
            $table->float('total_finance_amount')->default(0);
            $table->unsignedBigInteger('finance_manager');
            $table->unsignedBigInteger('sales_manager');
            $table->unsignedBigInteger('sales_person_1');
            $table->unsignedBigInteger('sales_person_2');

            //vehicle details
            $table->boolean('tax_credit')->default(true);
            $table->unsignedBigInteger('vehicle_type_id');
            $table->string('vin');
            $table->string('miles');


            //when rebate toggle is onn
            $table->boolean('is_rebate')->default(false);
            $table->text('rebate_description')->nullable();
            $table->float('rebate_amount_1')->nullable();
            $table->float('rebate_amount_2')->nullable();

            //when trade toggle is onn
            $table->boolean('is_trade')->default(false);
            $table->string('scc_account_number')->nullable();
            $table->float('payoff_amount')->nullable();
            $table->float('per_diem')->nullable();
            $table->timestamp('date_20_days_payoff')->nullable();
            $table->unsignedBigInteger('trade_lender')->nullable();

            $table->unsignedBigInteger('finance_lender');
            $table->unsignedBigInteger('rate_type_id');
            $table->float('buy_rate');
            $table->float('sell_rate');
            $table->boolean('is_flat_fee')->default(false);
            $table->boolean('is_percentage_of_amount_financed')->default(false);
            $table->float('package');
            $table->float('bank_fee');
            $table->boolean('is_special_finance_deal')->default(false);
            $table->string('special_deal_proof_document')->nullable();
            $table->float('down_payment');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
