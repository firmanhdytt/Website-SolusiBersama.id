<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\Sheets\SummarySheet;
use App\Exports\Sheets\TransactionsSheet;
use App\Exports\Sheets\ReceivableSheet;
use App\Exports\Sheets\OrdersSheet;
use Carbon\Carbon;

class BusinessReportExport implements WithMultipleSheets
{
    protected $from;
    protected $to;

    public function __construct(Carbon $from, Carbon $to)
    {
        $this->from = $from;
        $this->to   = $to;
    }

    public function sheets(): array
    {
        return [
            new SummarySheet($this->from, $this->to),
            new TransactionsSheet($this->from, $this->to),
            new ReceivableSheet($this->from, $this->to),
            new OrdersSheet($this->from, $this->to),
        ];
    }
}
