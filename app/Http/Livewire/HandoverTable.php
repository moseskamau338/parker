<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Handover;

class HandoverTable extends DataTableComponent
{
    public $text = 'original';

    public function columns(): array
    {
        return [
            Column::make('Handover ID', 'id'),
            Column::make('Shift ID', 'shift_id')
            ->sortable()->searchable(),
            Column::make('Cashier', 'shift.user.name')
            ->sortable()->searchable(),
            Column::make('Cash at Hand', 'cash_at_hand')->sortable()->searchable(),
            Column::make('Cash at Bank', 'cash_at_bank')->sortable()->searchable(),
            Column::make('Total Sales', 'total_sales')->sortable()->searchable(),
            Column::make('Completed Sales', 'completed_sales_count'),
            Column::make('Incomplete Sales', 'incomplete_sales_count'),
            Column::make('Approved', 'approved')
                ->sortable()->searchable()
            ->hideIf(! auth()->user()->hasRole(['admin','manager'])),
            Column::make('Approved By', 'approved_by')->hideIf(! auth()->user()->hasRole(['admin','manager'])),
            Column::make('Actions')
            ->hideIf(! auth()->user()->hasRole(['admin','manager'])),
        ];
    }

    public function query(): Builder
    {
        return Handover::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.handover_table';
    }

    public function approve(Handover $handover)
    {
       $handover->approved = true;
       $handover->approved_by = auth('sanctum')->id();
       $handover->save();

//       return redirect(request()->header('Referer'));

    }
    public function disapprove(Handover $handover)
    {
        $handover->approved = null;
       $handover->approved_by = null;
       $handover->save();

//       return redirect(request()->header('Referer'));

    }
}
