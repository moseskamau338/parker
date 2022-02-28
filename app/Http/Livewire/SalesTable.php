<?php

namespace App\Http\Livewire;

use App\Models\Gateway;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Response;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Sale;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class SalesTable extends DataTableComponent
{
    public bool $get_sales_stats = true;
    public array $all_records = [];

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
            'payment_method' => Filter::make('Payment Method')
                ->select(Gateway::options()),
            'status' => Filter::make('Status')
            ->select([
                    '' => 'Any',
                    'Paid' => 'PAID',
                    'Pending' => 'PENDING',
                    'Lost' => 'LOSS'
                ]),

        ];
    }

    public function columns(): array
    {
        return [
            Column::make('Agent', 'user.name')->searchable()->sortable(),
            Column::make('Customer', 'customer.name')->searchable()->sortable(),
            Column::make('Type', 'customer.type')->searchable()->sortable(),
            Column::make('Site', 'zone.name')->searchable()->sortable(),
//            Column::make('Shift', 'shift'),
            Column::make('Rate', 'rate.amount')->searchable()->sortable(),
            Column::make('Status')->searchable()->sortable(),
            Column::make('Duration (Mins)'),
            Column::make('Payment Method', 'gateway.name')->searchable()->sortable(),
            Column::make('Amount', 'totals')->searchable()->sortable(),
//            Column::make('Transaction Ref.'),
            Column::make('Created At')->searchable()->sortable(),
        ];
    }

    public function query(): Builder
    {
        $records = Sale::query()
            ->when($this->getFilter('from_date'), function($query, $from){
                    $query->where('created_at','>',$from )
                        ->when($this->getFilter('to_date'), fn ($query, $to) => $query->where('created_at','<',$to));
                })
            ->when($this->getFilter('payment_method'), function($query, $method){
                $query->where('gateway_id','=',$method);
            })
            ->when($this->getFilter('status'), function($query, $status){
                $query->where('status','=',$status);
            })
            ->latest();
        $this->all_records = $records->get()->toArray();
        return $records;
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.sales_table';
    }

//    public function render()
//    {
//        return view('sales.table')
//           ->with([
//                'columns' => $this->columns(),
//                'rowView' => $this->rowView(),
//                'filtersView' => $this->filtersView(),
//                'customFilters' => $this->filters(),
//                'rows' => $this->rows,
//                'modalsView' => $this->modalsView(),
//                'bulkActions' => $this->bulkActions,
//            ]);
//    }
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
