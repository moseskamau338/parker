<x-livewire-tables::table.cell>
    <span class="text-gray-500 font-bold">{{$row->id}}</span>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <span class="text-gray-500 font-bold">{{ucwords($row->name)}}</span>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <span class="text-gray-500">{{ucwords($row->username)}}</span>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <span class="text-gray-500">{{$row->email}}</span>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <span class="text-gray-500">{{$row->phone ?? '------'}}</span>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <span class="text-gray-500">{{$row->nat_id ?? '------'}}</span>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <span class="text-gray-500">{{ucwords($row->zone->name ?? '------')}}</span>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <span class="text-gray-500">{{ucwords($row->created_at->diffForHumans())}}</span>
</x-livewire-tables::table.cell>
