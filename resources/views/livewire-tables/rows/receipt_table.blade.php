<x-livewire-tables::table.cell>
    {{ $row->receipt_id }}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <span class="font-bold">KES {{ $row->amount }}</span>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <a target="_blank" href="{{url($row->file)}}">
        Download File
    </a>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <button wire:click.stop="delete({{$row->id}})" type="button" class="inline-flex items-center p-[1px] border border-transparent
    rounded-full
    shadow-sm
    text-red-500
    bg-red-100
    hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-200">
      <!-- Heroicon name: solid/plus -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </button>
</x-livewire-tables::table.cell>
