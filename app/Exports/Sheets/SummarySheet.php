<?php

namespace App\Exports\Sheets;

use App\Models\Order;
use App\Models\Payment;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class SummarySheet implements FromArray, WithStyles, WithTitle
{
    protected $from;
    protected $to;

    public function __construct(Carbon $from, Carbon $to)
    {
        $this->from = $from;
        $this->to   = $to;
    }

    public function array(): array
    {
        $payments = Payment::whereBetween('paid_at', [$this->from, $this->to])->get();
        $orders   = Order::whereBetween('created_at', [$this->from, $this->to])->get();

        return [
            ['LAPORAN BISNIS'],
            ['Periode: ' . $this->from->format('d F Y') . ' - ' . $this->to->format('d F Y')],
            ['Dicetak: ' . now()->format('d F Y H:i')],
            [],
            ['Keterangan', 'Nilai'],
            ['Total Transaksi', (int) $payments->count()],
            ['Total Pendapatan', (int) $payments->sum('amount')],
            ['Total Piutang', (int) $orders->sum(fn ($o) => $o->remainingPayment())],
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // ================= JUDUL =================
        $sheet->mergeCells('A1:B1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(15);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Periode & dicetak
        $sheet->mergeCells('A2:B2');
        $sheet->mergeCells('A3:B3');
        $sheet->getStyle('A2:A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // ================= HEADER TABEL =================
        $sheet->getStyle('A5:B5')->applyFromArray([
            'font' => ['bold' => true],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'F3F4F6'], // abu soft
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => ['borderStyle' => 'thin'],
            ],
        ]);

        // ================= ISI TABEL =================
        $sheet->getStyle('A6:B8')->getBorders()->getAllBorders()->setBorderStyle('thin');

        // Alignment kolom
        $sheet->getStyle('A6:A8')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('B6:B8')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

        // ================= FORMAT NOMINAL =================
        $sheet->getStyle('B7')->getNumberFormat()->setFormatCode('"Rp"#,##0');
        $sheet->getStyle('B8')->getNumberFormat()->setFormatCode('"Rp"#,##0');

        // Auto width
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
    }

    public function title(): string
    {
        return 'Ringkasan';
    }
}
