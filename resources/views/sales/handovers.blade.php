<x-app-layout>
  @include('layouts.includes.breadcrumb', ['crumbs'=>[
        (object)['name' => 'Sales', 'route'=>'sales'],
        (object)['name' => 'Handovers', 'route'=>'sales.handovers'],
    ]])
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
            <div class="flex justify-end">
                <a href="#" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium
                rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Record Bank Reciepts
                </a>
            </div>
            @livewire('sales-handover-table')
        </div>
    </div>
</x-app-layout>
