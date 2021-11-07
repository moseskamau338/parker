<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use phpDocumentor\Reflection\Types\Boolean;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Zone;

class ZonesTable extends DataTableComponent
{
    public bool $perPageAll = true;
    public function columns(): array
    {
        return [
            Column::make('Id')->addClass('sticky'),
            Column::make('Name')->addClass('sticky'),
            Column::make('Status')->addClass('sticky'),
            Column::make('Created')->addClass('sticky'),
            Column::make('Actions')->addClass('sticky'),
        ];
    }

    public function query(): Builder
    {
        return Zone::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.zones_table';
    }
    public function deactivate(Zone $zone)
    {
        $zone->active = 0;
        $zone->save();
        return false;
    }
    public function activate(Zone $zone)
    {
        $zone->active = 1;
        $zone->save();
        return true;
    }

    public function update($initial, $new)
    {
        $res = Zone::where('name',$initial)->first();
        if (!$res){
            abort(404, 'No such Site exists');
        }else{
            $res->name = $new;
            $res->save();
        }
        return back();
    }
}
