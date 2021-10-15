<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\SalesHandover;

class SalesHandoverTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Column Name'),
        ];
    }

    public function query(): Builder
    {
        return SalesHandover::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.sales_handover_table';
    }
}
