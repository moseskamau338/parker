<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Sale;

class SalesTable extends DataTableComponent
{
//    public array $bulkActions = [
//        'exportSelected' => 'Export',
//    ];

    public function columns(): array
    {
        return [
            Column::make('Agent', 'user')->searchable()->sortable(),
            Column::make('Customer', 'customer')->searchable()->sortable(),
            Column::make('Type', 'customer.type')->searchable()->sortable(),
            Column::make('Vehicle', 'vehicle')->searchable()->sortable(),
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
        return Sale::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.sales_table';
    }
}
