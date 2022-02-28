<?php

namespace App\Http\Livewire;

use App\Models\Gateway;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Response;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class TrafficReportTable extends DataTableComponent
{
    public bool $get_traffic_stats = true;

    public array $bulkActions = [
        'exportSelected' => 'Download CSV',
    ];
    public bool $perPageAll = true;
    public function filters(): array
    {
        return [
             'from_date' => Filter::make('From Date')
                ->date([
                    //'min' => now()->subYear()->format('Y-m-d'), // Optional
                    'max' => now()->format('Y-m-d') // Optional
                ]),
            'to_date' => Filter::make('To Date')
                ->date([
                    'max' => now()->format('Y-m-d') // Optional
                ]),
            'gateway'=> Filter::make('Payment Method')
                ->select(Gateway::options()),

        ];
    }
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
        return Sale::query()
                ->when($this->getFilter('from_date'), function($query, $from){
                    $query->where('created_at','>',$from )
                        ->when($this->getFilter('to_date'), fn ($query, $to) => $query->where('created_at','<',$to));
                })
                ->when($this->getFilter('gateway'), function($query, $method){
                    $query->where('gateway_id','=',$method);
                });

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
                "Content-Disposition" => "attachment; filename=traffic_report_".(int)now('Africa/Nairobi')->valueOf().'.csv',
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
                        $row->customer? $row->customer->name: '',
                        Carbon::parse($row->created_at)->toDateTimeString(),
                        Carbon::parse($row->created_at)->toDateTimeString(),
                        Carbon::parse($row->leave_time)->toDateTimeString() ?? '----',
                        Carbon::parse($row->created_at)->diffInMinutes(Carbon::parse($row->leave_time)),
                        $row->zone?$row->zone->name: '',
                        $row->gateway?$row->gateway->name: '',
                        ));
                }
                fclose($file);
            };

            return Response::stream($callback, 200, $headers);

        }
    }
}
