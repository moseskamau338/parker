<x-app-layout>
   @include('layouts.includes.breadcrumb', ['crumbs'=>[
        (object)['name' => 'Shift Handovers', 'route'=>'shifts.handovers'],
    ]])

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
            <h3 class="text-gray-700 text-2xl font-bold">Shift Handovers:</h3>
           @livewire('handover-table')
        </div>
    </div>
</x-app-layout>
