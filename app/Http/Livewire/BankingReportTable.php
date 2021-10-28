<?php

namespace App\Http\Livewire;

use App\Models\Receipt;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class BankingReportTable extends DataTableComponent
{

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
}
