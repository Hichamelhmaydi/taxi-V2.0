<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->decimal('amount', 10, 2); 
            $table->string('currency')->default('MAD'); 
            $table->enum('status', ['pending', 'completed', 'failed', 'cancelled'])->default('pending'); 
            $table->string('payment_method')->nullable(); 
            $table->string('transaction_id')->unique(); 
            $table->text('details')->nullable(); 
            $table->timestamps(); 
        });
    }

    public function down(): void {
        Schema::dropIfExists('transactions');
    }
};

