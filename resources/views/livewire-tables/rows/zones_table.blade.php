<x-livewire-tables::table.cell>
    {{$row->id}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{ucwords($row->name)}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{$row->created_at->diffForHumans()}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>

<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{$row->active? 'green':'red'}}-100
text-{{$row->active? 'green':'red'}}-800">
  {{$row->active? 'ACTIVE':'INACTIVE'}}
</span>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
<span class="relative z-0 inline-flex shadow-sm rounded-md">
  <a href="{{route('zones.web.show', ['zone'=>$row->id])}}" class="relative inline-flex items-center px-2 py-2 rounded-l-md border
  border-gray-300
  bg-white text-sm
  font-medium
  text-gray-500
  hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
    <span class="sr-only">View</span>
    <!-- Heroicon name: solid/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>
  </a>
  <button type="button" wire:click.stop="$emit('triggerEdit',`{{ $row->name }}`)" class="relative inline-flex items-center px-2 py-2
  border-b border-t
  border-gray-300 bg-white text-sm font-medium
  text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
    <span class="sr-only">Edit</span>
    <!-- Heroicon name: solid/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
    </svg>
  </button>
    @if($row->active)
      <button type="button" wire:click="$emit('triggerDelete',{{ $row->id }})" class="-ml-px relative inline-flex items-center px-2 py-2
      rounded-r-md border
      border-red-800 bg-red-100
      text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
        <span class="sr-only">Deactivate</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </button>
    @else
        <button type="button" wire:click="$emit('triggerActivate',{{ $row->id }})" class="-ml-px relative inline-flex items-center px-2 py-2
      rounded-r-md border
      border-green-800 bg-green-100
      text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
        <span class="sr-only">Activate</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </button>
    @endif

</span>
</x-livewire-tables::table.cell>

 @push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            @this.on('triggerDelete', zoneId => {
                Swal.fire({
                    title: 'Are You Sure?',
                    text: 'Site record will be deactivated!',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Deactivate!'
                }).then((result) => {
            //if user clicks on delete
                    if (result.value) {
                        @this.call('deactivate',zoneId)
                        Swal.fire('Done!', '', 'success')
                    } else {
                        Swal.fire('Operation Cancelled!', '', 'warning')

                    }
                });
            });
            @this.on('triggerActivate', zoneId => {
                Swal.fire({
                    title: 'Activate Site?',
                    text: 'Site record will be activated!',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Activate!'
                }).then((result) => {
            //if user clicks on delete
                    if (result.value) {
                 // calling destroy method to delete
                        @this.call('activate',zoneId);
                        Swal.fire('Done!', '', 'success')
                    } else {
                        Swal.fire('Operation Cancelled!', '', 'warning')

                    }
                });
            });
             @this.on('triggerEdit', async (zone) => {
                zone = String(zone)
                // console.log(zone)
                await Swal.fire({
                  title: 'Enter your IP address',
                  input: 'text',
                  inputLabel: 'Your IP address',
                  inputValue: zone,
                  showCancelButton: true,
                  inputValidator: (value) => {
                    if (!value || value === zone) {
                      return 'Please enter a valid Site name'
                    }
                  }
                }).then((result)=>{
                    if (result.value) {
                        @this.call('update',zone,result.value);
                      // Swal.fire(`Your New value is ${result.value}`)
                    }
                })
            });
        })
    </script>
    @endpush
