<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Zone;

class ZoneUsersTable extends DataTableComponent
{
    public Zone $zone;

    public function columns(): array
    {
        return [
            Column::make('Id')->searchable()->sortable(),
            Column::make('Name')->searchable()->sortable(),
            Column::make('Username')->searchable()->sortable(),
            Column::make('email')->searchable()->sortable(),
            Column::make('phone')->searchable()->sortable(),
            Column::make('ID Number', 'nat_id')->searchable()->sortable(),
            Column::make('Site', 'zone.name')->searchable()->sortable(),
            Column::make('Created', 'created_at')->sortable(),
        ];
    }

    public function query(): Builder
    {
        return User::query()->where('zone_id', $this->zone->id);
    }
}
