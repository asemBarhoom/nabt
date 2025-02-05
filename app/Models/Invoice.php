<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Mpdf\Mpdf;

class Invoice extends Model
{
    use HasFactory;
    public array $translatable = [];

    protected $guarded = [];


    // Cast specific attributes to their appropriate data types
    protected $casts = [
        'items' => 'array', // Cast items JSON to array
        'issue_date' => 'datetime',
        'due_date' => 'datetime',
        'subtotal' => 'decimal:2',
        'discount' => 'decimal:2',
        'tax_rate' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'total' => 'decimal:2',
        'amount_paid' => 'decimal:2',
        'remaining_amount' => 'decimal:2',
    ];

    // Default attributes
    protected $attributes = [
        'payment_status' => 'pending',
        'invoice_status' => 'draft',
    ];

    /**
     * Relationships
     */

    // Belongs to a user (creator or customer)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Belongs to a booking (if related to a booking system)
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * Accessors & Mutators
     */

    // Accessor for formatted total amount
    protected function formattedTotal(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($this->total, 2) . ' ' . config('app.currency', 'SAR')
        );
    }

    // Mutator for items array
    protected function items(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => json_encode($value)
        );
    }

    /**
     * Helpers
     */

    // Calculate the remaining amount
    public function calculateRemainingAmount(): void
    {
        $this->remaining_amount = $this->total - $this->amount_paid;
        $this->save();
    }

    // Add a payment to the invoice
    public function addPayment(float $amount): void
    {
        $this->amount_paid += $amount;
        $this->calculateRemainingAmount();

        if ($this->amount_paid >= $this->total) {
            $this->payment_status = 'paid';
        } elseif ($this->amount_paid > 0) {
            $this->payment_status = 'partially_paid';
        }

        $this->save();
    }

    // Check if the invoice is overdue
    public function isOverdue(): bool
    {
        return $this->due_date && now()->greaterThan($this->due_date);
    }

    // Mark the invoice as finalized
    public function finalize(): void
    {
        if ($this->invoice_status !== 'finalized') {
            $this->invoice_status = 'finalized';
            $this->save();
        }
    }

    // Cancel the invoice
    public function cancel(): void
    {
        $this->invoice_status = 'canceled';
        $this->payment_status = 'canceled';
        $this->save();
    }

    // Generate QR code data for the invoice (Saudi-compliant)
    public function generateQrCode(): string
    {
        // Prepare QR code data in a Saudi-compliant format
        $qrData = json_encode([
                                  'invoice_number' => $this->invoice_number,
                                  'issue_date' => $this->issue_date->format('Y-m-d H:i:s'),
                                  'total' => $this->total,
                                  'tax_amount' => $this->tax_amount,
                              ]);

        // Generate the QR code as a base64 string (useful for inline display)
        return QrCode::format('svg')->size(200)->generate($qrData);
    }

    // Check if the invoice is fully paid
    public function isFullyPaid(): bool
    {
        return $this->payment_status === 'paid';
    }

    // Check if the invoice is partially paid
    public function isPartiallyPaid(): bool
    {
        return $this->payment_status === 'partially_paid';
    }

    // Format the invoice's due date
    public function formattedDueDate(): string
    {
        return $this->due_date ? $this->due_date->format('d M Y') : 'N/A';
    }

    public function generatePdf(): string
    {
        // Get data for the invoice
        $data = [
            'invoice_number' => $this->invoice_number,
            'issue_date' => $this->issue_date,
            'due_date' => $this->due_date,
            'customer' => [
                'name' => $this->customer_name,
                'phone' => $this->customer_phone,
            ],
            'items' => $this->items,
            'total' => $this->total,
        ];

        // Generate the HTML using Blade
        $html = view('invoice-template', $data)->render();

        // Create an instance of Mpdf
        $mpdf = new Mpdf([
                             'default_font' => 'dejavusans', // Default font that supports Arabic
                         ]);

        // Write the HTML content to PDF
        $mpdf->WriteHTML($html);

        // Define the file path
        $filePath = 'invoices/invoice-' . $this->id . '.pdf';

        // Save the PDF in storage
        Storage::put($filePath, $mpdf->Output('', 'S')); // 'S' outputs the PDF as a string

        return $filePath;
    }


    protected static function boot()
    {
        parent::boot();

        static::created(function ($invoice) {
            // Generate PDF and save the file path
            $pdfPath = $invoice->generatePdf();
            $invoice->update(['pdf_path' => $pdfPath]);
        });
    }

}
