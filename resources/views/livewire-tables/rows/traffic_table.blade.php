{{--Vehicle--}}
<x-livewire-tables::table.cell>
    {{ucwords($row->customer->name?? '----')}}
</x-livewire-tables::table.cell>
{{--date--}}
<x-livewire-tables::table.cell>
    {{$row->created_at}}
</x-livewire-tables::table.cell>
{{--time in--}}
<x-livewire-tables::table.cell>
    {{ \Carbon\Carbon::parse($row->created_at)->toDateTimeString()?? '----' }}
</x-livewire-tables::table.cell>
{{--time out--}}
<x-livewire-tables::table.cell>
    {{ \Carbon\Carbon::parse($row->leave_time)->toDateTimeString() ?? '----' }}
</x-livewire-tables::table.cell>
{{--Duration--}}
<x-livewire-tables::table.cell>
    {{ $row->duration() }}
</x-livewire-tables::table.cell>
{{--Zone--}}
<x-livewire-tables::table.cell>
    {{ucwords($row->zone->name?? '----')}}
</x-livewire-tables::table.cell>

{{--Gateway--}}
<x-livewire-tables::table.cell>
    <span class="font-bold {{$row->gateway?->name === 'UNEXITED'?'text-red-600' : 'text-green-600'}}">
        {{$row->gateway->name ?? '----'}}
    </span>
</x-livewire-tables::table.cell>
