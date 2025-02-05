<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فاتورة حجز</title>
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 14px;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 20px;
            margin: 0;
        }
        .header p {
            font-size: 14px;
            margin: 5px 0;
        }
        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .row .label {
            font-weight: bold;
        }
        .details, .totals {
            margin-bottom: 20px;
        }
        .totals {
            border-top: 2px solid #ddd;
            padding-top: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Header -->
    <div class="header">
        <h1>فاتورة حجز</h1>
        <p>رقم الفاتورة: {{ @$invoice_number }}</p>
        <p>تاريخ الإصدار: {{ @$issue_date }}</p>
    </div>

    <!-- معلومات المنشأة -->
    <div class="details">
        <h3>معلومات المنشأة:</h3>
        <div class="row">
            <div class="label">اسم المنشأة:</div>
            <div>{{ env('APP_NAME') }}</div>
        </div>
        <div class="row">
            <div class="label">رقم السجل التجاري:</div>
            <div>{{ @$commercial_number }}</div>
        </div>
        <div class="row">
            <div class="label">رقم الضريبة:</div>
            <div>{{ @$tax_number }}</div>
        </div>
        <div class="row">
            <div class="label">عنوان المنشأة:</div>
            <div>{{ @$business_address }}</div>
        </div>
    </div>

    <!-- تفاصيل الحجز -->
    <div class="details">
        <h3>تفاصيل الحجز:</h3>
        <div class="row">
            <div class="label">رقم الحجز:</div>
            <div>{{ @$reservation_number }}</div>
        </div>
        <div class="row">
            <div class="label">عدد الأشخاص:</div>
            <div>{{ @$people_count }}</div>
        </div>
        <div class="row">
            <div class="label">التاريخ:</div>
            <div>{{ @$reservation_date }}</div>
        </div>
        <div class="row">
            <div class="label">الوقت:</div>
            <div>{{ @$reservation_time }}</div>
        </div>
    </div>

    <!-- ملخص التكاليف -->
    <div class="totals">
        <h3>ملخص التكاليف:</h3>
        <div class="row">
            <div class="label">المبلغ الإجمالي (قبل الضريبة):</div>
            <div>{{ number_format(@$total_before_tax, 2) }} ريال</div>
        </div>
        <div class="row">
            <div class="label">نسبة الضريبة ({{ @$tax_rate }}٪):</div>
            <div>{{ number_format(@$tax_amount, 2) }} ريال</div>
        </div>
        <div class="row">
            <div class="label">المبلغ الإجمالي (شامل الضريبة):</div>
            <div>{{ number_format(@$total_with_tax, 2) }} ريال</div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>تم إصدار هذه الفاتورة بناءً على أنظمة هيئة الزكاة والضريبة والجمارك.</p>
        <p>شكراً لاختياركم خدماتنا!</p>
    </div>
</div>
</body>
</html>
