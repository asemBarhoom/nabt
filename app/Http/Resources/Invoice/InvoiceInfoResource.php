<?php

namespace App\Http\Resources\Invoice;

use App\Helpers\FileHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'invoice_number' => $this->invoice_number,
            'invoice_type' => $this->invoice_type,
            'issue_date' => $this->issue_date->format('Y-m-d H:i:s'),
            'due_date' => optional($this->due_date)->format('Y-m-d H:i:s'),
            'customer' => [
                'name' => $this->customer_name,
                'email' => $this->customer_email,
                'phone' => $this->customer_phone,
                'address' => $this->customer_address,
                'vat_number' => $this->customer_vat_number,
            ],
            'supplier' => [
                'name' => $this->supplier_name,
                'vat_number' => $this->supplier_vat_number,
                'address' => $this->supplier_address,
            ],
            'items' => $this->items, // Assuming this is stored as JSON and cast to array
            'subtotal' => $this->subtotal,
            'total_before_tax' => $this->subtotal,
            'discount' => $this->discount,
            'tax_rate' => $this->tax_rate,
            'tax_amount' => $this->tax_amount,
            'total' => $this->total,
            'total_with_tax' => $this->subtotal+$this->tax_amount,
            'payment_status' => $this->payment_status,
            'invoice_status' => $this->invoice_status,
            'amount_paid' => $this->amount_paid,
            'remaining_amount' => $this->remaining_amount,
            'qr_code' => $this->generateQrCode(), // Generates the QR code inline
            'notes' => $this->notes,
            'created_by' => $this->created_by,
            'approved_by' => $this->approved_by,
            // User relationship
            'user' => $this->whenLoaded('user', function () {
                return [
                    'id' => $this->user->id,
                    'name' => $this->user->name,
                    'email' => $this->user->email,
                ];
            }),

            // Booking relationship
            'booking' => $this->whenLoaded('booking', function () {
                return [
                    'id' => $this->booking->id,
                    'reference' => $this->booking->reference_number,
                    'status' => $this->booking->status,
                    'date' => $this->booking->date,
                ];
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'commercial_number' => 'commercial_number',
            'tax_number' => 'tax_number',
            'business_address' => 'business_address',
            'pdf_path' => url('storage/' . object_get($this,'pdf_path')),

        ];
    }
}
