<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Response;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TrafficReportTable extends DataTableComponent
{
    public array $bulkActions = [
        'exportSelected' => 'Download CSV',
    ];
    public function columns(): array
    {
        return [
            Column::make('Vehicle Registration', 'customer.name')->searchable()->sortable(),
            Column::make('Date','created_at')->searchable()->sortable(),
            Column::make('Time in'),
            Column::make('Time Out'),
            Column::make('Duration (Mins)'),
            Column::make('Site', 'zone')->searchable()->sortable(),
            Column::make('Payment Method', 'gateway')->searchable()->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Sale::query();
    }
    public function rowView(): string
    {
        return 'livewire-tables.rows.traffic_table';
    }

    public function exportSelected()
    {
        if ($this->selectedRowsQuery->count() > 0){
           $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=traffic_report.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            $records = $this->selectedRowsQuery()->get();
            $columns = array('Vehicle Registration', 'Date', 'Time in', 'Time Out', 'Duration (Mins)', 'Site', 'Payment Method');

            $callback = function() use ($records, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach($records as $row) {
                    fputcsv($file, array(
                        $row->customer->name,
                        Carbon::parse($row->created_at)->toDateTimeString(),
                        Carbon::parse($row->created_at)->toDateTimeString(),
                        Carbon::parse($row->leave_time)->toDateTimeString() ?? '----',
                        Carbon::parse($row->created_at)->diffInMinutes(Carbon::parse($row->leave_time)),
                        $row->zone->name,
                        $row->gateway->name,
                        ));
                }
                fclose($file);
            };

            return Response::stream($callback, 200, $headers);

        }
    }
}
