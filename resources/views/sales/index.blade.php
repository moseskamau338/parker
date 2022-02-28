<x-app-layout>
     @include('layouts.includes.breadcrumb', ['crumbs'=>[
        (object)['name' => 'Dashboard', 'route'=>'dashboard'],
        (object)['name' => 'Sales', 'route'=>'sales'],
    ]])

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
        @if (\App\Models\Sale::count() <= 0)
            <div clss="flex">
                <div class="h-32 w-32 bg-gray-300 rounded-full flex m-auto ring-4 ring-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-[6rem] w-[6rem] text-gray-400 justify-center m-auto items-center" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 9a2 2 0 114 0 2 2 0 01-4 0z" />
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a4 4 0 00-3.446 6.032l-2.261 2.26a1 1 0 101.414 1.415l2.261-2.261A4 4 0 1011 5z" clip-rule="evenodd" />
                        </svg>
                </div>
                <div class="m-auto w-[440px] relative mt-5 text-center">
                    <h2 class="text-4xl font-bold text-gray-500">No sales recorded yet!</h2>
                    <p class="text-gray-500 text-lg">
                        All sales initiated through your <strong>mobile terminals</strong> will appear in this section.
                    </p>
                </div>
            </div>
        @else
        <h3 class="ml-6 text-2xl"> Sales </h3>


            @livewire('sales-table')
        @endif
        </div>
    </div>


</x-app-layout>
