<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id(); // المفتاح الأساسي
            $table->string('invoice_number')->unique(); // رقم الفاتورة الفريد (رقم الفاتورة الضريبية)
            $table->string('invoice_type')->default('standard'); // نوع الفاتورة (قياسية، مبسطة)
            $table->dateTime('issue_date'); // تاريخ إصدار الفاتورة
            $table->dateTime('due_date')->nullable(); // تاريخ استحقاق الفاتورة (إن وجد)

            // تفاصيل العميل
            $table->string('customer_name'); // اسم العميل
            $table->string('customer_email')->nullable(); // بريد العميل الإلكتروني
            $table->string('customer_phone')->nullable(); // هاتف العميل
            $table->string('customer_address')->nullable(); // عنوان العميل
            $table->string('customer_vat_number')->nullable(); // الرقم الضريبي للعميل

            // تفاصيل المورد/البائع
            $table->string('supplier_name'); // اسم المورد
            $table->string('supplier_vat_number'); // الرقم الضريبي للمورد
            $table->string('supplier_address'); // عنوان المورد

            // تفاصيل المنتجات أو الخدمات
            $table->json('items'); // قائمة المنتجات/الخدمات (تُخزّن كـ JSON تحتوي على الاسم، الكمية، السعر لكل منتج)
            $table->decimal('subtotal', 15, 2); // إجمالي المبلغ قبل الضريبة
            $table->decimal('discount', 15, 2)->default(0); // الخصم (إن وجد)
            $table->decimal('tax_rate', 5, 2)->default(15.00); // نسبة الضريبة المضافة (مثلاً 15%)
            $table->decimal('tax_amount', 15, 2); // قيمة الضريبة المضافة
            $table->decimal('total', 15, 2); // الإجمالي النهائي بعد الخصم والضريبة
            $table->string('pdf_path')->nullable(); // Add PDF path column

            // حالة الفاتورة والدفع
            $table->enum('payment_status', [
                'pending',          // الدفع قيد الانتظار
                'paid',             // تم الدفع بالكامل
                'partially_paid',   // تم دفع جزء من المبلغ
                'canceled',         // تم إلغاء الفاتورة أو الدفع
                'refunded',         // تم استرداد المبلغ المدفوع
                'overdue',          // فاتورة متأخرة عن السداد
                'failed',           // فشل في عملية الدفع
                'in_progress',      // الدفع قيد المعالجة
                'disputed',         // دفع محل نزاع
                'scheduled',        // الدفع مجدول ليتم لاحقًا
                'on_hold',          // الدفع معلق بانتظار إجراء (مثل تأكيد من العميل)
                'write_off',        // شطب الدين (لن يتم تحصيله)
            ])->default('pending');
            $table->enum('invoice_status', [
                'draft',            // مسودة (الفاتورة غير مكتملة)
                'finalized',        // تم تأكيد الفاتورة
                'archived',         // تم أرشفة الفاتورة
                'canceled',         // تم إلغاء الفاتورة
                'revised',          // الفاتورة تم تعديلها
                'pending_approval', // بانتظار موافقة (مثل مدير أو مسؤول)
                'approved',         // تمت الموافقة على الفاتورة
                'rejected',         // تم رفض الفاتورة
                'issued',           // تم إصدار الفاتورة
                'paid',             // الفاتورة مدفوعة بالكامل
                'partially_paid',   // الفاتورة مدفوعة جزئيًا
                'overdue',          // فاتورة متأخرة عن السداد
                'closed',           // تم إغلاق الفاتورة (لا يمكن تعديلها)
            ])->default('draft');
            $table->string('payment_method')->nullable(); // طريقة الدفع (مثل بطاقة ائتمان، تحويل بنكي)
            $table->decimal('amount_paid', 15, 2)->default(0); // المبلغ المدفوع
            $table->decimal('remaining_amount', 15, 2)->default(0); // المبلغ المتبقي

            // الرموز والتوقيعات
            $table->string('qr_code')->nullable(); // رمز QR (مطلوب في الفاتورة الضريبية)
            $table->string('digital_signature')->nullable(); // التوقيع الرقمي (للامتثال إلى متطلبات هيئة الزكاة)

            // بيانات إضافية
            $table->text('notes')->nullable(); // ملاحظات إضافية
            $table->string('created_by')->nullable(); // المستخدم الذي أنشأ الفاتورة
            $table->string('approved_by')->nullable(); // المستخدم الذي وافق على الفاتورة (إن وجد)
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('booking_id')->nullable();

            $table->timestamps(); // created_at و updated_at

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->foreign('booking_id')
                ->references('id')
                ->on('bookings')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
