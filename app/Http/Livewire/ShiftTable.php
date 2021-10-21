<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Shift;

class ShiftTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->searchable()->sortable(),
            Column::make('Cashier', 'user.name')->searchable()->sortable(),
            Column::make('Zone', 'zone.name')->searchable()->sortable(),
            Column::make('Start Time', 'start')->searchable()->sortable(),
            Column::make('End Time', 'end')->searchable()->sortable(),
            Column::make('Status'),
        ];
    }

    public function query(): Builder
    {
        return Shift::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.shift_table';
    }
}
