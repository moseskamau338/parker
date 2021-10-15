<x-app-layout>
  @include('layouts.includes.breadcrumb', ['crumbs'=>[
        (object)['name' => 'Sales', 'route'=>'sales'],
        (object)['name' => 'Handovers', 'route'=>'sales.handovers'],
    ]])
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
            @livewire('sales-handover-table')
        </div>
    </div>
</x-app-layout>
