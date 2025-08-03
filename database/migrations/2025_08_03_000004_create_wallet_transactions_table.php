<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('transaction_type', ['credit', 'debit']);
            $table->decimal('amount', 10, 2);
            $table->string('description', 255)->nullable();
            $table->integer('reference_id')->nullable();
            $table->decimal('balance_after', 10, 2);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wallet_transactions');
    }
};
