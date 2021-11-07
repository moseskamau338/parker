<?php

namespace App\Http\Livewire;

use App\Models\Receipt;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Response;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class BankingReportTable extends DataTableComponent
{
    public array $bulkActions = [
        'exportSelected' => 'Download CSV',
    ];
    public bool $perPageAll = true;
    public function columns(): array
    {
        return [
             Column::make('Staff', 'user.username')->searchable()->sortable(),
            Column::make('Amount Banked', 'amount')->searchable()->sortable(),
            Column::make('Transaction Ref.', 'receipt_id')->searchable()->sortable(),
            Column::make('Site', 'user.zone.name')->searchable()->sortable(),
            Column::make('Date', 'created_at')->searchable()->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Receipt::query();
    }
    public function exportSelected()
    {
        if ($this->selectedRowsQuery->count() > 0){
           $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=banking_report_".(int)now('Africa/Nairobi')->valueOf().'.csv',
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            $records = $this->selectedRowsQuery()->get();
            $columns = array('Staff', 'Amount Banked', 'Transaction Ref.', 'Site', 'Date');

            $callback = function() use ($records, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach($records as $row) {
                    fputcsv($file, array(
                        $row->user? $row->user->username : '',
                        $row->amount,
                        $row->receipt_id,
                        $row->user && $row->user->zone? $row->user->zone->name : '',
                        Carbon::parse($row->created_at)->toDateTimeString(),
                        ));
                }
                fclose($file);
            };

            return Response::stream($callback, 200, $headers);

        }
    }
}
