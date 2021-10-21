<x-livewire-tables::table.cell>
    {{ucwords($row->id)}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{ucwords($row->user->name)}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{ucwords($row->zone->name)}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{$row->start}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{$row->end ?? '------'}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{$row->end?'green':'red'}}-100 text-{{$row->end?'green':'red'}}-800">
      {{$row->end? 'COMPLETE' : 'PENDING'}}
    </span>
</x-livewire-tables::table.cell>
