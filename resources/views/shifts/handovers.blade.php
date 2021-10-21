<x-app-layout>
   @include('layouts.includes.breadcrumb', ['crumbs'=>[
        (object)['name' => 'Shift Handovers', 'route'=>'shifts.handovers'],
    ]])

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
            <h3 class="text-gray-700 text-2xl font-bold">Shift Handovers:</h3>
            <div class="mb-4 flex justify-end">
            <a href="{{route('shifts.view')}}" class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs
            font-medium
            rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                </svg>

              View Shifts
            </a>
        </div>
           @livewire('handover-table')
        </div>
    </div>
</x-app-layout>
