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
            Column::make('Handover ID', 'id'),
            Column::make('Shift ID', 'shift_id')
            ->sortable()->searchable(),
            Column::make('Cashier', 'from')
            ->sortable()->searchable(),
            Column::make('Manager', 'to')->sortable()->searchable(),
            Column::make('Amount', 'amount_transferred')->sortable()->searchable(),
            Column::make('Cash at Hand', 'cash_at_hand')->sortable()->searchable(),
            Column::make('Cash at Bank', 'cash_at_bank'),
            Column::make('Date', 'created_at'),
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
        return SalesHandover::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.sales_handover_table';
    }
      public function approve(SalesHandover $handover)
        {
           $handover->approved = true;
           $handover->approved_by = auth('sanctum')->id();
           $handover->save();

    //       return redirect(request()->header('Referer'));

        }
        public function disapprove(SalesHandover $handover)
        {
            $handover->approved = null;
           $handover->approved_by = null;
           $handover->save();

    //       return redirect(request()->header('Referer'));

        }
}
