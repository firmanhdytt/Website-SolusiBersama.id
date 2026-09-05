<?php

namespace App\Exports\Sheets;

use App\Models\Order;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrdersSheet implements FromCollection, WithHeadings, WithTitle, WithEvents
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
        return Order::whereBetween('created_at', [$this->from, $this->to])
            ->get()
            ->map(fn ($o) => [
                $o->nama,
                $o->email,
                $o->layanan,
                ucfirst($o->status),
                $o->deadline
                    ? Carbon::parse($o->deadline)->format('d/m/Y')
                    : '-',
            ]);
    }

    /**
     * HEADER TABEL
     */
    public function headings(): array
    {
        return ['Nama', 'Email', 'Layanan', 'Status', 'Deadline'];
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

                $sheet->setCellValue('A1', 'LAPORAN ORDER');
                $sheet->mergeCells('A1:E1');
                $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
                $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

                $sheet->setCellValue(
                    'A2',
                    'Periode: ' .
                    $this->from->format('d F Y') .
                    ' - ' .
                    $this->to->format('d F Y')
                );
                $sheet->mergeCells('A2:E2');
                $sheet->getStyle('A2')->getAlignment()->setHorizontal('center');

                // ================= HEADER TABEL =================
                $sheet->getStyle('A5:E5')->getFont()->setBold(true);
                $sheet->getStyle('A5:E5')->getBorders()->getAllBorders()->setBorderStyle('thin');

                // ================= ISI DATA =================
                $lastRow = $sheet->getHighestRow();

                for ($row = 6; $row <= $lastRow; $row++) {

                    $sheet->getStyle("A{$row}:E{$row}")
                        ->getBorders()
                        ->getAllBorders()
                        ->setBorderStyle('thin');
                }

                // Auto width
                foreach (range('A', 'E') as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
            }
        ];
    }

    public function title(): string
    {
        return 'Order';
    }
}
