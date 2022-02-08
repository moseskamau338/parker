<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Response;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Sale;

class SalesTable extends DataTableComponent
{
    public $bulkActions = [
        'exportSelected' => 'Download CSV',
    ];
    public bool $perPageAll = true;

    public function columns(): array
    {
        return [
            Column::make('Agent', 'user')->searchable()->sortable(),
            Column::make('Customer', 'customer')->searchable()->sortable(),
            Column::make('Type', 'customer.type')->searchable()->sortable(),
            Column::make('Site', 'zone')->searchable()->sortable(),
//            Column::make('Shift', 'shift'),
            Column::make('Rate', 'rate')->searchable()->sortable(),
            Column::make('Status')->searchable()->sortable(),
            Column::make('Duration (Mins)'),
            Column::make('Payment Method', 'gateway')->searchable()->sortable(),
            Column::make('Amount', 'amount')->searchable()->sortable(),
            Column::make('Transaction Ref.'),
            Column::make('Created At')->searchable()->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Sale::query()->latest();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.sales_table';
    }
      public function exportSelected()
    {
        if ($this->selectedRowsQuery->count() > 0){
           $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=sales_report_".(int)now('Africa/Nairobi')->valueOf().'.csv',
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            $records = $this->selectedRowsQuery()->get();
            $columns = array('Agent','Customer','Type','Site','Rate','Status','Duration (Mins)','Payment Method','Amount','Transaction Ref.','Created At');

            $callback = function() use ($records, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach($records as $row) {
                    fputcsv($file, array(
                        $row->user? $row->user->username : '',
                        $row->customer? $row->customer->name : '',
                        $row->customer? $row->customer->type : '',
                        $row->zone? $row->zone->name : '',
                        $row->rate? (string)$row->rate->amount.'/'.$row->rate->rate : '',
                        $row->status,
                        Carbon::parse($row->created_at)->diffInMinutes(Carbon::parse($row->leave_time)).' minutes',
                        $row->gateway? $row->gateway->name: '',
                        'KSH '.$row->totals,
                        $row->ref,
                        Carbon::parse($row->created_at)->toDateTimeString(),
                        ));
                }
                fclose($file);
            };

            return Response::stream($callback, 200, $headers);

        }
    }
}
