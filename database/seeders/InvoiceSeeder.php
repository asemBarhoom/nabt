<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate sample invoices
        for ($i = 1; $i <= 10; $i++) {
            $items = [
                [
                    'name' => 'Product ' . $i,
                    'quantity' => rand(1, 5),
                    'unit_price' => rand(50, 200),
                    'total_price' => rand(50, 200) * rand(1, 5),
                ],
                [
                    'name' => 'Service ' . $i,
                    'quantity' => rand(1, 3),
                    'unit_price' => rand(100, 500),
                    'total_price' => rand(100, 500) * rand(1, 3),
                ],
            ];

            $subtotal = array_sum(array_column($items, 'total_price'));
            $discount = rand(0, 100); // Random discount
            $tax_rate = 15.00; // Fixed tax rate
            $tax_amount = ($subtotal - $discount) * ($tax_rate / 100);
            $total = $subtotal - $discount + $tax_amount;

            DB::table('invoices')->insert([
                                              'invoice_number' => 'INV-' . strtoupper(Str::random(8)),
                                              'invoice_type' => 'standard',
                                              'issue_date' => now()->subDays(rand(1, 30)),
                                              'due_date' => now()->addDays(rand(1, 30)),

                                              // Customer details
                                              'customer_name' => 'Customer ' . $i,
                                              'customer_email' => 'customer' . $i . '@example.com',
                                              'customer_phone' => '05' . rand(10000000, 99999999),
                                              'customer_address' => 'Address ' . $i,
                                              'customer_vat_number' => 'VAT-' . rand(100000, 999999),

                                              // Supplier details
                                              'supplier_name' => 'Supplier ' . $i,
                                              'supplier_vat_number' => 'SUP-VAT-' . rand(100000, 999999),
                                              'supplier_address' => 'Supplier Address ' . $i,

                                              // Items and amounts
                                              'items' => json_encode($items),
                                              'subtotal' => $subtotal,
                                              'discount' => $discount,
                                              'tax_rate' => $tax_rate,
                                              'tax_amount' => $tax_amount,
                                              'total' => $total,

                                              // Payment and invoice status
                                              'payment_status' => ['pending', 'paid', 'canceled', 'partially_paid', 'refunded', 'overdue', 'failed', 'in_progress', 'disputed', 'scheduled', 'on_hold', 'write_off'][rand(0, 11)],
                                              'invoice_status' => ['draft', 'finalized', 'archived', 'canceled', 'revised', 'pending_approval', 'approved', 'rejected', 'issued', 'paid', 'partially_paid', 'overdue', 'closed'][rand(0, 12)],
                                              'payment_method' => [
                                                  'Credit Card',         // بطاقة ائتمان
                                                  'Debit Card',          // بطاقة خصم
                                                  'Bank Transfer',       // تحويل بنكي
                                                  'Cash',                // نقدًا
                                                  'Mobile Payment',      // دفع عبر الهاتف (Apple Pay، Mada Pay)
                                                  'PayPal',              // بايبال
                                                  'Cheque',              // شيك
                                                  'Cryptocurrency',      // العملات الرقمية (مثل بيتكوين)
                                                  'Prepaid Card',        // بطاقة مسبقة الدفع
                                                  'Direct Debit',        // خصم مباشر (مثل الاشتراكات الشهرية)
                                                  'Gift Card',           // بطاقة هدايا
                                                  'Wallet Balance',      // رصيد المحفظة الرقمية
                                                  'Voucher',             // قسيمة دفع
                                                  'POS',                 // جهاز نقطة البيع
                                                  'Other',               // طرق دفع أخرى

                                                  // طرق الدفع الخاصة بالسعودية:
                                                  'Mada',                // شبكة المدفوعات السعودية "مدى"
                                                  'Sadad',               // نظام "سداد" للمدفوعات
                                                  'STC Pay',             // محفظة إلكترونية مقدمة من STC
                                                  'Apple Pay',           // أبل باي (مستخدمة بكثافة في السوق السعودي)
                                                  'Google Pay',          // جوجل باي
                                                  'Samsung Pay',         // سامسونج باي
                                                  'PayTabs',             // بوابة الدفع PayTabs
                                                  'Tamara',              // خدمة تمارا (اشتر الآن وادفع لاحقًا)
                                                  'Tabby',               // خدمة تابي (اشتر الآن وادفع لاحقًا)
                                                  'HyperPay',            // بوابة الدفع HyperPay
                                                  'Payfort',             // بوابة الدفع Payfort
                                                  'Qitaf',               // برنامج نقاط تابع لشركة STC
                                                  'Cash on Delivery'     // الدفع عند الاستلام (شائع للتجارة الإلكترونية)
                                              ][rand(0, 23)],
                                              'amount_paid' => $total - rand(0, $total),
                                              'remaining_amount' => rand(0, $total),

                                              // QR Code and signature
                                              'qr_code' => Str::random(20),
                                              'digital_signature' => Str::random(40),

                                              // Other fields
                                              'notes' => 'This is a sample note for invoice ' . $i,
                                              'created_by' => 'Admin',
                                              'approved_by' => rand(0, 1) ? 'Manager' : null,
                                              'user_id' => rand(1, 3), // Assuming `users` table has IDs from 1 to 5
                                              'booking_id' => rand(1, 3), // Assuming `bookings` table has IDs from 1 to 10
                                              'created_at' => now(),
                                              'updated_at' => now(),
                                          ]);
        }
    }
}
