<x-livewire-tables::table.cell>
{{ucwords($row->user->username ?? '----')}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
{{ucwords($row->customer->name?? '----')}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
{{ucwords($row->customer->type)}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
{{ucwords($row->zone->name?? '----')}}
</x-livewire-tables::table.cell>
{{--<x-livewire-tables::table.cell>--}}
{{--#{{$row->shift_id}}--}}
{{--</x-livewire-tables::table.cell>--}}
<x-livewire-tables::table.cell>
{{$row->rate->amount}}/{{$row->rate->rate}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>

    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{$row->status === 'green' ? 'red':
    'PENDING'}}-100 text-{{$row->status === 'green' ? 'red':
    'PENDING'}}-800">
      {{$row->status === 'PAID' ? 'PAID': 'PENDING'}}
    </span>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
{{
    \Carbon\Carbon::parse($row->created_at)->diffInMinutes(\Carbon\Carbon::parse($row->leave_time))

}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
{{$row->gateway->name?? '----'}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    KES {{floatval($row->totals)}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
------
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{$row->created_at}}
</x-livewire-tables::table.cell>
