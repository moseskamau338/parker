<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Id')->searchable()->sortable(),
            Column::make('Name')->searchable()->sortable(),
            Column::make('Username')->searchable()->sortable(),
            Column::make('email')->searchable()->sortable(),
            Column::make('phone')->searchable()->sortable(),
            Column::make('ID Number', 'nat_id')->searchable()->sortable(),
            Column::make('Zone', 'zone.name')->searchable()->sortable(),
            Column::make('Created')->sortable(),
//            Column::make('Actions')->sortable(),
        ];
    }

    public function query(): Builder
    {
        return User::query()
            ->where('id', '!=', auth()->id());
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.user_table';
    }
}
