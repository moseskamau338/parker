<x-app-layout>
    @include('layouts.includes.breadcrumb', ['crumbs'=>[
        (object)['name' => 'Reports', 'route'=>'reports'],
    ]])

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
             <h2 class="text-2xl mt-5 text-gray-500 font-semibold">Banking Report</h2>
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col mt-2">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                @livewire('banking-report-table')
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
