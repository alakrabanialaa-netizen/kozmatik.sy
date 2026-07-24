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
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('customer_name');
        $table->string('customer_phone');
        $table->string('customer_address');
        $table->decimal('total_amount', 10, 2);
        $table->decimal('total_cost', 10, 2)->default(0); // مجموع التكلفة لحساب الأرباح
        $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');
        $table->timestamps();
    });
}
};
