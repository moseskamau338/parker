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
    @php
    $color = '';
        if ($row->status === 'PAID'){
            $color = 'bg-green-100 text-green-800';
        }else if($row->status === 'PENDING'){
            $color = 'bg-yellow-100 text-yellow-800';
        }else if($row->status === 'LOSS'){
            $color = 'bg-red-100 text-red-800';
        }
    @endphp
    <span class="inline-flex items-center px-2.5 py-0.5 font-bold rounded-full text-xs font-medium {{$color}}">
      {{$row->status}}
    </span>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
{{ $row->duration() }}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
<span class="font-bold {{$row->gateway?->name === 'UNEXITED'?'text-red-600' : 'text-green-600'}}">{{$row->gateway->name ??
'----'}}</span>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    KES {{floatval($row->totals)}}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <span class="px-2">{{$row->created_at}}</span>
</x-livewire-tables::table.cell>
