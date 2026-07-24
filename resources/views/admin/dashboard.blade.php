@extends('layouts.admin')

@section('content')
<div class="space-y-8">
    <!-- Stat Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-sm border border-stone-200">
            <p class="text-sm font-medium text-stone-500">إجمالي المبيعات</p>
            <h3 class="text-3xl font-bold text-stone-900 mt-2">${{ number_format($totalSales, 2) }}</h3>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-stone-200">
            <p class="text-sm font-medium text-stone-500">صافي الربح التقديري</p>
            <h3 class="text-3xl font-bold text-emerald-600 mt-2">${{ number_format($netProfit, 2) }}</h3>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-stone-200">
            <p class="text-sm font-medium text-stone-500">إجمالي الطلبات</p>
            <h3 class="text-3xl font-bold text-stone-900 mt-2">{{ $totalOrders }}</h3>
        </div>
    </div>

    <!-- Low Stock Alert -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-stone-200">
        <h3 class="text-lg font-bold text-stone-800 mb-4">تنبيهات المخزون (منتجات أوشكت على النفاد)</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-right text-sm text-stone-600">
                <thead class="bg-stone-50 text-stone-700 uppercase font-semibold">
                    <tr>
                        <th class="py-3 px-4">اسم المنتج</th>
                        <th class="py-3 px-4">سعر البيع</th>
                        <th class="py-3 px-4">المخزون المتبقي</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($lowStockProducts as $product)
                        <tr>
                            <td class="py-3 px-4 font-medium text-stone-900">{{ $product->name }}</td>
                            <td class="py-3 px-4">${{ number_format($product->price, 2) }}</td>
                            <td class="py-3 px-4 font-bold text-red-600">{{ $product->stock }} قطعة</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-4 text-center text-stone-400">جميع المنتجات متوفرة بمخزون جيد.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection