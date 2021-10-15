<x-app-layout>
   @include('layouts.includes.breadcrumb', ['crumbs'=>[
        (object)['name' => 'Shift Handovers', 'route'=>'shifts.handovers'],
    ]])

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
            @livewire('shifts.handovers')
        </div>
    </div>
</x-app-layout>
