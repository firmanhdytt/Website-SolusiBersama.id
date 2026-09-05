<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;

class Order extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'layanan',
        'pesan',
        'budget',
        'deadline',
        'status',
        'status_pembayaran',
    ];

    protected $casts = [
        'deadline' => 'date',
        'budget'   => 'integer',
    ];

    /**
     * ============================
     * RELATION: ORDER -> PAYMENTS
     * ============================
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * ============================
     * TOTAL PEMBAYARAN (SUM)
     * ============================
     */
    public function totalPaid(): int
    {
        return (int) $this->payments()->sum('amount');
    }

    /**
     * ============================
     * HITUNG STATUS PEMBAYARAN
     * ============================
     * - belum  : belum ada pembayaran
     * - dp     : sudah bayar tapi belum lunas
     * - lunas  : total pembayaran >= budget
     */
    public function paymentStatus(): string
    {
        $paid = $this->totalPaid();

        if ($paid <= 0) {
            return 'belum';
        }

        if ($paid < $this->budget) {
            return 'dp';
        }

        return 'lunas';
    }

    /**
     * ============================
     * SISA TAGIHAN
     * ============================
     */
    public function remainingPayment(): int
    {
        $remaining = $this->budget - $this->totalPaid();
        return $remaining > 0 ? $remaining : 0;
    }
}
