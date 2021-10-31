<x-livewire-tables::table.cell>
    #{{$row->id}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    #{{$row->shift_id}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <span class="text-blue-600 font-bold">{{$row->shift->user->name}}</span>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <span class="font-bold">KES {{$row->cash_at_hand}}</span>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
   {{$row->completed_sales_count}} sales
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
   <span class="text-red-400">{{$row->incomplete_sales_count}} sales</span>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <span class="text-2xl font-bold">KES {{$row->total_sales}}</span>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    @if($row->approved)
        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800">
          Approved
        </span>
    @else
        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-red-100 text-red-800">
          Not Approved
        </span>
    @endif
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    @if($row->approved)
        <span class="font-medium focus:underline text-gren-800">
          User #{{$row->approved_by}}
        </span>
    @else
        ----
    @endif
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    @if(!$row->approved)
     <button wire:click="approve({{$row->id}})" title="Approve" type="button" class="inline-flex items-center p-1 border border-transparent rounded-full shadow-sm text-white
     bg-green-400
     hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      <!-- Heroicon name: solid/plus -->
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-800" viewBox="0 0 20 20" fill="currentColor">
      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
    </svg>
    </button>
    @else
        <button wire:click="disapprove({{$row->id}})" title="Disapprove" type="button" class="inline-flex items-center p-1 border
        border-transparent
        rounded-full
        shadow-sm
        text-white bg-red-600
         hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-3">
      <!-- Heroicon name: solid/plus -->
         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
            </svg>
    </button>
        @endif
</x-livewire-tables::table.cell>
