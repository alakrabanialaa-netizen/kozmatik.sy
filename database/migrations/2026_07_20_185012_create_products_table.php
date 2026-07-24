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
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->string('name');
        $table->string('slug')->unique();
        $table->text('description')->nullable();
        $table->decimal('price', 10, 2); // سعر البيع
        $table->decimal('cost_price', 10, 2)->default(0); // التكلفة للمحاسبة
        $table->integer('stock')->default(0); // مخزون المستودع
        $table->string('image')->nullable();
        $table->boolean('is_active')->default(true);
        $table->boolean('is_featured')->default(false); // للمنتجات المميزة
        $table->timestamps();
    });
}
};
