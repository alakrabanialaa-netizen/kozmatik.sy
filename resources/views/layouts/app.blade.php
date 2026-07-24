<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOZMATIK | متجر العناية والجمال</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Tajawal', sans-serif; } </style>
</head>
<body class="bg-stone-950 text-stone-100 flex flex-col min-h-screen">

    <!-- Transparent Fixed Header -->
    <header class="absolute top-0 left-0 w-full z-50 bg-gradient-to-b from-black/80 via-black/40 to-transparent">
        <div class="max-w-7xl mx-auto px-6 h-24 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-2xl font-bold tracking-[0.2em] text-white uppercase drop-shadow">
                KOZMATIK
            </a>

            <nav class="hidden md:flex space-x-8 space-x-reverse font-light text-stone-200 text-sm tracking-wide">
                <a href="{{ route('home') }}" class="hover:text-amber-400 transition">الرئيسية</a>
                <a href="{{ route('shop.index') }}" class="hover:text-amber-400 transition">المتجر</a>
                <a href="{{ route('catalog') }}" class="hover:text-amber-400 transition">الكتالوج</a>
                <a href="{{ route('about') }}" class="hover:text-amber-400 transition">من نحن</a>
                <a href="{{ route('contact') }}" class="hover:text-amber-400 transition">تواصل معنا</a>
            </nav>

            <div class="flex items-center space-x-4 space-x-reverse">
                <a href="{{ route('cart') }}" class="p-2 text-stone-200 hover:text-amber-400 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                </a>
                <a href="{{ route('admin.dashboard') }}" class="text-xs border border-white/30 bg-white/10 backdrop-blur-md text-white px-4 py-2 rounded-full hover:bg-white hover:text-black transition">
                    لوحة التحكم
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Dark Luxury Footer -->
    <footer class="bg-black text-stone-500 py-12 border-t border-stone-900">
        <div class="max-w-7xl mx-auto px-4 text-center space-y-4">
            <h3 class="text-xl font-bold text-white tracking-widest uppercase">KOZMATIK</h3>
            <p class="text-xs text-stone-400">عناية فاخرة ومنتجات تجميل طبيعية مصممة خصيصاً لإبراز جمالك.</p>
            <p class="text-xs text-stone-600 pt-6 border-t border-stone-900">&copy; {{ date('Y') }} KOZMATIK. جميع الحقوق محفوظة.</p>
        </div>
    </footer>

</body>
</html>