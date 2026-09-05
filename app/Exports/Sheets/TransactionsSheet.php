<?php

namespace App\Exports\Sheets;

use App\Models\Payment;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransactionsSheet implements
    FromCollection,
    WithHeadings,
    WithMapping,
    WithTitle,
    WithColumnFormatting,
    WithEvents
{
    protected $from;
    protected $to;

    public function __construct(Carbon $from, Carbon $to)
    {
        $this->from = $from;
        $this->to   = $to;
    }

    /**
     * DATA
     */
    public function collection()
    {
        return Payment::with('order')
            ->whereBetween('paid_at', [$this->from, $this->to])
            ->orderBy('paid_at', 'desc')
            ->get();
    }

    /**
     * HEADER TABEL
     */
    public function headings(): array
    {
        return ['Tanggal', 'Klien', 'Email', 'Layanan', 'Metode', 'Nominal'];
    }

    /**
     * MAP DATA (AMAN, INT)
     */
    public function map($p): array
    {
        return [
            Carbon::parse($p->paid_at)->format('d/m/Y'),
            $p->order->nama,
            $p->order->email,
            $p->order->layanan,
            strtoupper($p->method),
            (int) $p->amount,
        ];
    }

    /**
     * FORMAT KOLOM
     */
    public function columnFormats(): array
    {
        return [
            'F' => '"Rp"#,##0',
        ];
    }

    /**
     * STYLING + JUDUL
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                /** @var Worksheet $sheet */
                $sheet = $event->sheet->getDelegate();

                // ================= JUDUL =================
                $sheet->insertNewRowBefore(1, 4);

                $sheet->setCellValue('A1', 'LAPORAN TRANSAKSI');
                $sheet->mergeCells('A1:F1');
                $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
                $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

                $sheet->setCellValue(
                    'A2',
                    'Periode: ' .
                    $this->from->format('d F Y') .
                    ' - ' .
                    $this->to->format('d F Y')
                );
                $sheet->mergeCells('A2:F2');
                $sheet->getStyle('A2')->getAlignment()->setHorizontal('center');

                // ================= HEADER TABEL =================
                $sheet->getStyle('A5:F5')->getFont()->setBold(true);
                $sheet->getStyle('A5:F5')->getBorders()->getAllBorders()->setBorderStyle('thin');

                // ================= ISI DATA =================
                $lastRow = $sheet->getHighestRow();

                for ($row = 6; $row <= $lastRow; $row++) {

                    $sheet->getStyle("A{$row}:F{$row}")
                        ->getBorders()
                        ->getAllBorders()
                        ->setBorderStyle('thin');
                }

                // Auto width
                foreach (range('A', 'F') as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
            }
        ];
    }

    public function title(): string
    {
        return 'Transaksi';
    }
}
