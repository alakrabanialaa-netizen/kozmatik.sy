@extends('layouts.app')

@section('content')
<!-- Luxury Minimalist Hero Banner -->
<section class="relative w-full h-screen flex items-center justify-center overflow-hidden bg-stone-950">
    <style>
        @keyframes float-subtle {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .animate-subtle { animation: float-subtle 5s ease-in-out infinite; }
    </style>

    <!-- Background Video -->
    <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover opacity-50 scale-105">
        <source src="{{ asset('videos/hero.mp4') }}" type="video/mp4">
        <source src="https://assets.mixkit.co/videos/preview/mixkit-woman-applying-creams-to-her-face-41553-large.mp4" type="video/mp4">
    </video>

    <!-- Luxury Vignette Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-stone-950 via-stone-950/20 to-stone-950/80"></div>

    <!-- Floating Luxury Product Badge (Left) -->
    <div class="absolute top-1/3 left-[6%] z-20 hidden xl:block animate-subtle pointer-events-none">
        <div class="bg-black/40 backdrop-blur-2xl border border-white/10 p-5 rounded-2xl shadow-2xl max-w-xs space-y-2">
            <span class="text-[10px] tracking-[0.2em] text-amber-400 font-semibold uppercase">Organic Formula</span>
            <h4 class="text-sm font-medium text-white">إكسير العناية الفائقة</h4>
            <p class="text-xs text-stone-400 font-light leading-relaxed">مكونات طبيعية 100% مستخلصة خصيصاً لاستعادة نضارة البشرة.</p>
        </div>
    </div>

    <!-- Floating Stat Badge (Right) -->
    <div class="absolute bottom-1/3 right-[6%] z-20 hidden xl:block animate-subtle pointer-events-none" style="animation-delay: 2s;">
        <div class="bg-black/40 backdrop-blur-2xl border border-white/10 p-5 rounded-2xl shadow-2xl text-right space-y-1">
            <div class="text-2xl font-light text-amber-200 tracking-wider">98%</div>
            <p class="text-xs text-stone-300 font-light">نتائج ملحوظة من الأسابيع الأولى</p>
        </div>
    </div>

    <!-- Main Hero Content -->
    <div class="relative z-10 text-center text-white px-6 space-y-8 max-w-3xl pt-12">
        <div class="inline-flex items-center gap-2 bg-white/5 backdrop-blur-md border border-white/10 px-5 py-2 rounded-full">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
            <span class="text-xs uppercase tracking-[0.25em] font-light text-stone-300">KOZMATIK BOTANICALS</span>
        </div>

        <h1 class="text-4xl sm:text-6xl md:text-7xl font-extrabold tracking-tight leading-tight text-stone-100 drop-shadow-2xl">
            سر الإشراقة <br> <span class="font-light italic text-amber-200/90">الدائمة</span>
        </h1>

        <p class="text-stone-300 text-sm sm:text-base md:text-lg font-light max-w-xl mx-auto leading-relaxed drop-shadow">
            مستحضرات مصممة بعناية فائقة لتندمج مع جمالك الطبيعي وتمنح بشرتك العناية المستحقة.
        </p>

        <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('shop.index') }}" class="w-full sm:w-auto bg-amber-600 hover:bg-amber-500 text-white font-medium text-xs tracking-widest uppercase px-9 py-4 rounded-full transition-all duration-300 shadow-xl hover:scale-105">
                تصفحي المجموعة
            </a>
            <a href="{{ route('catalog') }}" class="w-full sm:w-auto bg-white/5 hover:bg-white/10 border border-white/20 backdrop-blur-md text-white font-medium text-xs tracking-widest uppercase px-9 py-4 rounded-full transition-all duration-300">
                الكتالوج الرقمي
            </a>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="max-w-7xl mx-auto px-6 py-24 bg-stone-950">
    <div class="flex flex-col items-center space-y-3 mb-16 text-center">
        <span class="text-xs text-amber-500 uppercase tracking-[0.2em] font-medium">تشكيلاتنا الفاخرة</span>
        <h2 class="text-3xl sm:text-4xl font-bold text-white tracking-wide">الأقسام الرئيسية</h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($categories as $category)
            <div class="group bg-stone-900/40 border border-stone-800/80 rounded-2xl p-8 text-center space-y-4 hover:border-amber-500/50 hover:bg-stone-900/80 transition-all duration-500 flex flex-col justify-between">
                <div class="space-y-3">
                    <h3 class="text-xl font-medium text-stone-100 group-hover:text-amber-300 transition">{{ $category->name }}</h3>
                    <p class="text-xs text-stone-400 font-light leading-relaxed">{{ $category->description ?? 'منتجات مميزة ومصممة لعنايتك.' }}</p>
                </div>
                <div class="pt-4 border-t border-stone-800/40">
                    <a href="{{ route('shop.index', ['category' => $category->id]) }}" class="inline-block text-amber-400 font-medium hover:underline text-xs tracking-wider">
                        استكشفي المجموعات &rarr;
                    </a>
                </div>
            </div>
        @empty
            <p class="text-center text-stone-500 col-span-4">لا توجد أقسام مضافة حالياً.</p>
        @endforelse
    </div>
</section>

<!-- 🌟 SHOWCASE SECTION 1: Image Right, Turkish/English Content Left -->
<section class="bg-stone-950 py-20 border-t border-stone-900 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Image Side (Right) -->
            <div class="relative group order-1 lg:order-1">
                <div class="absolute -inset-1 bg-gradient-to-r from-amber-600/30 to-amber-900/20 rounded-3xl blur-2xl opacity-50 group-hover:opacity-80 transition duration-1000"></div>
                <div class="relative aspect-[4/5] rounded-3xl overflow-hidden border border-stone-800 shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1608248597260-8f9f60bc9318?q=80&w=1000&auto=format&fit=crop" 
                         alt="Botanical Serum" 
                         class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 p-4 bg-black/40 backdrop-blur-md rounded-xl border border-white/10">
                        <p class="text-amber-300 font-serif italic text-sm">Gelişmiş Cilt Yenileme Formülü</p>
                        <p class="text-xs text-stone-300">Advanced Skin Renewal Formula</p>
                    </div>
                </div>
            </div>

            <!-- Text Content Side (Left) -->
            <div class="space-y-6 order-2 lg:order-2 text-left" dir="ltr">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-amber-500/10 border border-amber-500/20 rounded-full text-amber-400 text-xs font-mono tracking-widest uppercase">
                    Premium Botanical Serum
                </div>
                
                <h2 class="text-3xl sm:text-5xl font-light tracking-tight text-white leading-tight font-serif">
                    Doğal Işıltınızı <br> <span class="italic text-amber-200">Yeniden Keşfedin</span>
                </h2>

                <p class="text-stone-400 text-sm sm:text-base font-light leading-relaxed">
                    Formulated with pure botanical oils and hyaluronic acid to deeply hydrate, plump, and restore your skin’s youthful radiance. Dermatologically tested for sensitive skin.
                </p>

                <!-- Key Highlights List -->
                <div class="grid grid-cols-2 gap-4 pt-2">
                    <div class="border-l border-amber-500/40 pl-4 py-1">
                        <h4 class="text-white font-medium text-sm">%100 Organik</h4>
                        <p class="text-xs text-stone-500">100% Organic Ingredients</p>
                    </div>
                    <div class="border-l border-amber-500/40 pl-4 py-1">
                        <h4 class="text-white font-medium text-sm">24 Saat Nem</h4>
                        <p class="text-xs text-stone-500">24h Deep Hydration</p>
                    </div>
                </div>

                <div class="pt-6">
                    <a href="{{ route('shop.index') }}" class="inline-flex items-center gap-3 bg-stone-900 border border-stone-700 hover:border-amber-500 text-stone-100 px-8 py-3.5 rounded-full text-xs uppercase tracking-widest transition duration-300 hover:bg-amber-600 hover:text-white">
                        <span>Keşfet & Discover</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 🌟 SHOWCASE SECTION 2: Text Left, Image Left (Reversed Layout) -->
<section class="bg-stone-900/30 py-20 border-t border-stone-900 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Text Content Side -->
            <div class="space-y-6 text-left" dir="ltr">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-rose-500/10 border border-rose-500/20 rounded-full text-rose-300 text-xs font-mono tracking-widest uppercase">
                    Velvet Matte Lipstick Collection
                </div>
                
                <h2 class="text-3xl sm:text-5xl font-light tracking-tight text-white leading-tight font-serif">
                    Kusursuz Dokunuş, <br> <span class="italic text-rose-200">Kalıcı Şıklık</span>
                </h2>

                <p class="text-stone-400 text-sm sm:text-base font-light leading-relaxed">
                    Infused with jojoba oil and vitamin E, our velvet lipstick delivers rich pigmentation with an ultra-lightweight finish that lasts all day without drying your lips.
                </p>

                <!-- Features Badges -->
                <div class="flex flex-wrap gap-3 pt-2">
                    <span class="bg-stone-950 border border-stone-800 text-stone-300 text-xs px-4 py-2 rounded-lg">Vegan & Cruelty-Free</span>
                    <span class="bg-stone-950 border border-stone-800 text-stone-300 text-xs px-4 py-2 rounded-lg">12 Hours Wear</span>
                    <span class="bg-stone-950 border border-stone-800 text-stone-300 text-xs px-4 py-2 rounded-lg">Rich Pigment</span>
                </div>

                <div class="pt-6">
                    <a href="{{ route('shop.index') }}" class="inline-flex items-center gap-3 bg-amber-600 hover:bg-amber-500 text-white px-8 py-3.5 rounded-full text-xs uppercase tracking-widest transition duration-300 shadow-lg">
                        <span>Incele & Shop Now</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Image Side -->
            <div class="relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-rose-600/20 to-amber-600/20 rounded-3xl blur-2xl opacity-50 group-hover:opacity-80 transition duration-1000"></div>
                <div class="relative aspect-[4/5] rounded-3xl overflow-hidden border border-stone-800 shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1586495777744-4413f21062fa?q=80&w=1000&auto=format&fit=crop" 
                         alt="Luxury Lipstick" 
                         class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 p-4 bg-black/40 backdrop-blur-md rounded-xl border border-white/10 text-right" dir="rtl">
                        <p class="text-rose-300 font-medium text-sm">مجموعة أحمر الشفاه المخملي</p>
                        <p class="text-xs text-stone-300">ألوان غنية وثبات يدوم طوال اليوم</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="bg-stone-950 border-t border-stone-900 py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col items-center space-y-3 mb-16 text-center">
            <span class="text-xs text-amber-500 uppercase tracking-[0.2em] font-medium">اخترنا لكِ</span>
            <h2 class="text-3xl font-bold text-white tracking-wide">المنتجات المميزة</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @forelse($featuredProducts as $product)
                <div class="bg-stone-950 border border-stone-800/80 rounded-2xl overflow-hidden flex flex-col justify-between hover:border-amber-500/30 transition-all duration-300 group">
                    <div class="p-6 space-y-3">
                        <h3 class="font-medium text-stone-100 text-base group-hover:text-amber-200 transition">{{ $product->name }}</h3>
                        <p class="text-xs text-stone-400 font-light line-clamp-2 leading-relaxed">{{ $product->description }}</p>
                    </div>
                    <div class="p-6 border-t border-stone-900 flex items-center justify-between">
                        <span class="font-semibold text-amber-400 text-sm">${{ number_format($product->price, 2) }}</span>
                        <a href="{{ route('shop.show', $product->slug) }}" class="bg-stone-900 border border-stone-700 text-stone-200 text-xs px-4 py-2 rounded-full hover:bg-amber-600 hover:border-amber-600 hover:text-white transition-all">التفاصيل</a>
                    </div>
                </div>
            @empty
                <p class="text-center text-stone-500 col-span-4">لا توجد منتجات مميزة لعرضها حالياً.</p>
            @endforelse
        </div>
    </div>
</section>

<!-- 🩺 Floating Doctor Consultation Widget -->
<div class="fixed bottom-6 right-6 z-50">
    <!-- Floating Button -->
    <button onclick="toggleConsultationModal()" class="group flex items-center gap-3 bg-stone-900/90 hover:bg-amber-600 border border-amber-500/40 text-white p-3 sm:px-5 sm:py-3.5 rounded-full shadow-2xl backdrop-blur-xl transition-all duration-300 hover:scale-105">
        <div class="relative">
            <span class="text-xl">🩺</span>
            <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-emerald-500 rounded-full animate-ping"></span>
            <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-emerald-500 rounded-full"></span>
        </div>
        <div class="text-right hidden sm:block">
            <p class="text-xs font-semibold text-amber-300 group-hover:text-white transition">استشارة طبيب مختص</p>
            <p class="text-[10px] text-stone-300 group-hover:text-stone-100 font-light">مجاناً عبر البريد الإلكتروني</p>
        </div>
    </button>
</div>

<!-- Consultation Modal / Chat Window -->
<div id="consultationModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm">
    <div class="bg-stone-950 border border-stone-800 rounded-3xl w-full max-w-lg overflow-hidden shadow-2xl relative">
        
        <!-- Modal Header -->
        <div class="bg-stone-900 p-6 border-b border-stone-800 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-amber-500/20 border border-amber-500/40 flex items-center justify-center text-xl">
                    👨‍⚕️
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-white">استشارة أخصائي البشرة والتجميل</h3>
                    <p class="text-[11px] text-emerald-400 font-light flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> متصل الآن لمساعدتك
                    </p>
                </div>
            </div>
            <button onclick="toggleConsultationModal()" class="text-stone-400 hover:text-white text-xl font-bold">&times;</button>
        </div>

        <!-- Form Body -->
        <form id="consultationForm" onsubmit="submitConsultation(event)" class="p-6 space-y-4 text-right" dir="rtl">
            @csrf
            
            <div id="responseAlert" class="hidden p-3 rounded-xl text-xs"></div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs text-stone-400 mb-1">الاسم الكامل *</label>
                    <input type="text" name="name" required class="w-full bg-stone-900 border border-stone-800 rounded-xl px-3 py-2.5 text-xs text-white focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-xs text-stone-400 mb-1">البريد الإلكتروني *</label>
                    <input type="email" name="email" required class="w-full bg-stone-900 border border-stone-800 rounded-xl px-3 py-2.5 text-xs text-white focus:outline-none focus:border-amber-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs text-stone-400 mb-1">رقم الهاتف (اختياري)</label>
                    <input type="text" name="phone" class="w-full bg-stone-900 border border-stone-800 rounded-xl px-3 py-2.5 text-xs text-white focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-xs text-stone-400 mb-1">نوع البشرة</label>
                    <select name="skin_type" class="w-full bg-stone-900 border border-stone-800 rounded-xl px-3 py-2.5 text-xs text-stone-300 focus:outline-none focus:border-amber-500">
                        <option value="عادية">بشرة عادية</option>
                        <option value="جافة">بشرة جافة</option>
                        <option value="دهنية">بشرة دهنية</option>
                        <option value="مختلطة">بشرة مختلطة</option>
                        <option value="حساسة">بشرة حساسة</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs text-stone-400 mb-1">مشكلتك أو استفسارك *</label>
                <textarea name="message" rows="4" required placeholder="اشرحي حالة بشرتك أو المنتجات التي ترغبين في الاستفسار عنها..." class="w-full bg-stone-900 border border-stone-800 rounded-xl p-3 text-xs text-white focus:outline-none focus:border-amber-500"></textarea>
            </div>

            <button type="submit" id="submitBtn" class="w-full bg-amber-600 hover:bg-amber-500 text-white py-3 rounded-xl text-xs font-semibold uppercase tracking-wider transition duration-300">
                إرسال الاستشارة مجاناً
            </button>
        </form>

    </div>
</div>

<script>
    function toggleConsultationModal() {
        const modal = document.getElementById('consultationModal');
        modal.classList.toggle('hidden');
    }

    async function submitConsultation(e) {
        e.preventDefault();
        const form = document.getElementById('consultationForm');
        const btn = document.getElementById('submitBtn');
        const alert = document.getElementById('responseAlert');

        btn.disabled = true;
        btn.innerText = 'جاري الإرسال...';

        const formData = new FormData(form);

        try {
            const response = await fetch("{{ route('consultation.send') }}", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                alert.className = "p-3 rounded-xl text-xs bg-emerald-500/20 text-emerald-300 border border-emerald-500/30";
                alert.innerText = data.message;
                alert.classList.remove('hidden');
                form.reset();
                setTimeout(() => toggleConsultationModal(), 3000);
            }
        } catch (error) {
            alert.className = "p-3 rounded-xl text-xs bg-rose-500/20 text-rose-300 border border-rose-500/30";
            alert.innerText = "حدث خطأ أثناء الإرسال، يرجى المحاولة لاحقاً.";
            alert.classList.remove('hidden');
        } finally {
            btn.disabled = false;
            btn.innerText = 'إرسال الاستشارة مجاناً';
        }
    }
</script>


<!-- Main Luxury Footer -->
<footer class="bg-stone-950 text-stone-400 border-t border-stone-800/80 pt-20 pb-12">
    <div class="max-w-7xl mx-auto px-6">
        
        <!-- Footer Columns Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-16 border-b border-stone-900">
            
            <!-- Column 1: Contact Information (معلومات التواصل) -->
            <div class="space-y-4">
                <h3 class="text-white text-base font-semibold tracking-wider uppercase border-b border-amber-500/30 pb-3">معلومات التواصل</h3>
                <ul class="space-y-3 text-xs font-light">
                    <li class="flex items-center gap-3">
                        <span class="text-amber-500 text-sm">📍</span>
                        <span>إسطنبول، تركيا - شارع الموضة</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="text-amber-500 text-sm">📞</span>
                        <span dir="ltr" class="text-right">+90 (555) 000-0000</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="text-amber-500 text-sm">✉️</span>
                        <a href="mailto:info@kozmatik.com" class="hover:text-amber-400 transition">info@kozmatik.com</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="text-amber-500 text-sm">🕒</span>
                        <span>الإثنين - السبت: 9:00 ص - 8:00 م</span>
                    </li>
                </ul>
            </div>

            <!-- Column 2: All Products (جميع المنتجات) -->
            <div class="space-y-4">
                <h3 class="text-white text-base font-semibold tracking-wider uppercase border-b border-amber-500/30 pb-3">جميع المنتجات</h3>
                <ul class="space-y-2.5 text-xs font-light">
                    <li><a href="#" class="hover:text-amber-400 transition">كوزمتيك & مكياج</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">العناية بالبشرة</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">العناية بالشعر</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">العناية بالجسم</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">منتجات خاصة لكي</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">منتجات حسب اختيارك</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">العروض الحصرية</a></li>
                </ul>
            </div>

            <!-- Column 3: Privacy & Policies (سياسة الخصوصية والشروط) -->
            <div class="space-y-4">
                <h3 class="text-white text-base font-semibold tracking-wider uppercase border-b border-amber-500/30 pb-3">سياسة الخصوصية</h3>
                <ul class="space-y-2.5 text-xs font-light">
                    <li><a href="#" class="hover:text-amber-400 transition">الشروط والأحكام</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">الشهادات ومعايير الجودة</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">سياسة الاستخدام العادل</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">المنتجات الموصى بها</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">سياسة الإرجاع والشحن</a></li>
                </ul>
            </div>

            <!-- Column 4: Brand Intro & Newsletter -->
            <div class="space-y-4">
                <h3 class="text-white text-base font-semibold tracking-wider uppercase border-b border-amber-500/30 pb-3">عن الماركة</h3>
                <p class="text-xs text-stone-400 font-light leading-relaxed">
                    نقدم لكِ أفضل مستحضرات التجميل والعناية الفاخرة المصممة بمكونات طبيعية لتعزيز جمالك وإشراقتك اليومية.
                </p>
                <div class="pt-2">
                    <span class="text-[10px] uppercase tracking-widest text-amber-500 font-semibold block mb-2">اشتركي للتوصل بجديدنا</span>
                    <form class="flex items-center">
                        <input type="email" placeholder="البريد الإلكتروني..." class="bg-stone-900 text-xs text-white px-3 py-2 rounded-r-lg border border-stone-800 focus:outline-none focus:border-amber-500 w-full">
                        <button type="submit" class="bg-amber-600 hover:bg-amber-500 text-white text-xs px-4 py-2 rounded-l-lg transition">انضمام</button>
                    </form>
                </div>
            </div>

        </div>

        <!-- Social Media Icons Section -->
        <div class="flex justify-center items-center gap-6 py-8">
            <a href="#" class="w-10 h-10 rounded-full bg-stone-900 border border-stone-800 flex items-center justify-center text-stone-300 hover:text-amber-400 hover:border-amber-500/50 transition duration-300">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
            </a>
            <a href="#" class="w-10 h-10 rounded-full bg-stone-900 border border-stone-800 flex items-center justify-center text-stone-300 hover:text-amber-400 hover:border-amber-500/50 transition duration-300">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.374 14.5 5 15.5 5H18V0h-3.808C10.592 0 9 1.847 9 5.052V8z"/></svg>
            </a>
            <a href="#" class="w-10 h-10 rounded-full bg-stone-900 border border-stone-800 flex items-center justify-center text-stone-300 hover:text-amber-400 hover:border-amber-500/50 transition duration-300">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </a>
        </div>

        <!-- Privacy & Cookie Notice Banner (مطابق للصورة) -->
        <div class="bg-stone-900/80 border border-stone-800 rounded-2xl p-6 text-center space-y-3 max-w-3xl mx-auto shadow-2xl backdrop-blur-md">
            <p class="text-xs text-stone-300 font-light leading-relaxed">
                Sitemizde en iyi kullanıcı deneyimini yaşayabilmenizi sağlamak için çerezler ve izleme yöntemleri kullanıyoruz. Siteye giriş yaparak bu bilgilere erişmemize izin vermiş olursunuz.
            </p>
            <p class="text-xs text-stone-400">
                Daha fazla bilgi için <a href="#" class="text-amber-400 underline hover:text-amber-300 transition">Çerez Politikası</a> sayfamızı inceleyebilirsiniz.
            </p>
            <div class="pt-2">
                <button onclick="this.parentElement.parentElement.remove()" class="bg-white text-black hover:bg-stone-200 font-medium text-xs px-8 py-2.5 rounded-full transition shadow-md">
                    Kabul et ve pencereyi kapat
                </button>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center text-[11px] text-stone-600 pt-8 font-light">
            &copy; {{ date('Y') }} KOZMATIK. Tous droits réservés. Designed for Luxury.
        </div>

    </div>
</footer>
@endsection