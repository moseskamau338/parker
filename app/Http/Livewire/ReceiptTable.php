<?php

namespace App\Http\Livewire;

use App\Models\Receipt;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Support\Facades\File;

class ReceiptTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Ref. ID', 'receipt_id')->searchable()->sortable(),
            Column::make('Amount')->searchable()->sortable(),
            Column::make('File'),
            Column::make('Actions'),
        ];
    }

    public function query(): Builder
    {
        return Receipt::query();
    }
    public function rowView(): string
    {
         // Becomes /resources/views/location/to/my/row.blade.php
         return 'livewire-tables.rows.receipt_table';
    }

    public function delete(Receipt $receipt)
    {
        try {
            //delete file
           if(File::exists($receipt->file)){
               File::delete($receipt->file);
           }
            $receipt->delete();
            session()->flash('notification', (object)[
                 'color'=>'yellow',
                 'message' => 'Receipt deleted successfully!'
             ]);
        }catch (\Throwable $e){
            session()->flash('notification', (object)[
                 'color'=>'red',
                 'message' => 'Error!'.$e->getMessage()
             ]);
        }
    }
}
