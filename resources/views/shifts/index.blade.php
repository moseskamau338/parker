<x-app-layout>
  @include('layouts.includes.breadcrumb', ['crumbs'=>[
        (object)['name' => 'View Shifts', 'route'=>'users'],
    ]])
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6 p-2">
            <div class="mb-4 flex justify-end">
                <a href="{{route('shifts.handovers')}}" class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs
                font-medium
                rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  View Handover
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        @livewire('shift-table')
    </div>
</div>
</x-app-layout>
