<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Response;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserTable extends DataTableComponent
{
      public $bulkActions = [
            'exportSelected' => 'Download CSV',
        ];
      public bool $perPageAll = true;
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
      public function exportSelected()
    {
        if ($this->selectedRowsQuery->count() > 0){
           $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=users_export_".(int)now('Africa/Nairobi')->valueOf().'.csv',
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            $records = $this->selectedRowsQuery()->get();
            $columns = array('Id','Name','Username','Email','Phone','National ID','Site','Created');

            $callback = function() use ($records, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach($records as $row) {
                    fputcsv($file, array(
                        $row->id,
                        $row->name,
                        $row->username,
                        $row->email,
                        $row->phone,
                        $row->nat_id,
                        $row->zone->name,
                        Carbon::parse($row->created_at)->toDateTimeString(),
                        ));
                }
                fclose($file);
            };

            return Response::stream($callback, 200, $headers);

        }
    }
}
