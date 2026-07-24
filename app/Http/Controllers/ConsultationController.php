<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use Illuminate\Support\Facades\Mail;

class ConsultationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // 1. حفظ الاستشارة في قاعدة البيانات
        $consultation = Consultation::create($request->all());

        // 2. إرسال إيميل تنبيه للآدمن/الدكتور
        try {
            Mail::raw("استشارة جديدة من العميل:\n\nالاسم: {$consultation->name}\nالإيميل: {$consultation->email}\nالهاتف: {$consultation->phone}\nنوع البشرة: {$consultation->skin_type}\n\nالاستشارة:\n{$consultation->message}", function ($message) use ($consultation) {
                $message->to(env('MAIL_FROM_ADDRESS', 'info@kozmatik.com'))
                        ->subject("🩺 استشارة طبية جديدة من: {$consultation->name}");
            });
        } catch (\Exception $e) {
            // الاستمرار حتى لو حدثت مشكلة بإعدادات السيرفر
        }

        return response()->json([
            'success' => true,
            'message' => 'تم إرسال استشارتك بنجاح! سيتواصل معك الطبيب المختص عبر البريد الإلكتروني قريباً.'
        ]);
    }
}