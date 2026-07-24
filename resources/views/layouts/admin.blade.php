<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم | KOZMATIK</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Tajawal', sans-serif; } </style>
</head>
<body class="bg-stone-100 text-stone-800 flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-stone-900 text-stone-300 flex flex-col">
        <div class="h-20 flex items-center justify-center border-b border-stone-800 text-xl font-bold text-white tracking-widest">
            KOZMATIK ADMIN
        </div>
        <nav class="flex-1 px-4 py-6 space-y-2 font-medium">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded hover:bg-stone-800 hover:text-white transition">الرئيسية والمحاسبة</a>
            <a href="{{ route('admin.products.index') }}" class="block px-4 py-3 rounded hover:bg-stone-800 hover:text-white transition">إدارة المنتجات والمخزون</a>
            <a href="{{ route('admin.categories.index') }}" class="block px-4 py-3 rounded hover:bg-stone-800 hover:text-white transition">إدارة الأقسام</a>
            <a href="{{ route('admin.orders.index') }}" class="block px-4 py-3 rounded hover:bg-stone-800 hover:text-white transition">إدارة الطلبات</a>
            <a href="{{ route('home') }}" class="block px-4 py-3 rounded hover:bg-stone-800 hover:text-white transition text-stone-500 pt-8">العودة للمتجر &rarr;</a>
        </nav>
    </aside>

    <!-- Main Area -->
    <div class="flex-1 flex flex-col overflow-y-auto">
        <header class="bg-white shadow-sm h-20 flex items-center justify-between px-8 border-b border-stone-200">
            <h2 class="text-xl font-bold text-stone-800">لوحة الإدارة والمحاسبة</h2>
        </header>

        <main class="p-8">
            @yield('content')
        </main>
    </div>

</body>
</html>