<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <nav class="flex" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                <div>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                    <!-- Heroicon name: solid/home -->
                    <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span class="sr-only">Home</span>
                    </a>
                </div>
                </li>

                <li>
                    <div class="flex items-center">
                        <!-- Heroicon name: solid/chevron-right -->
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <a href="{{route('dashboard')}}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">
                            {{ __('Dashboard') }}
                        </a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <!-- Heroicon name: solid/chevron-right -->
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <a href="{{route('sales')}}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">
                            {{ __('Sales') }}
                        </a>
                    </div>
                </li>
            </ol>
            </nav>

        </h2>
    </x-slot>

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
            <div class="mb-4">
              <dl class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-3">
                <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden sm:p-6 h-[max-content]">
                  <dt class="text-sm font-medium text-gray-500 truncate">
                    Total Paid Sales
                  </dt>
                  <dd class="mt-1 text-2xl font-semibold text-gray-700">
                    KES {{number_format($data->paid->sum,2)}}
                  </dd>
                    <dd class="mt-1 text-sm font-semibold text-gray-500">
                    Total of: {{$data->paid->count}} records
                  </dd>
                </div>

                <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden sm:p-6 h-[max-content]">
                  <dt class="text-sm font-medium text-gray-500 truncate">
                    Total Pending Sales
                  </dt>
                  <dd class="mt-1 text-2xl font-semibold text-gray-700">
                    KES {{number_format($data->pending->sum,2)}}
                  </dd>
                    <dd class="mt-1 text-sm font-semibold text-gray-500">
                    Total of: {{$data->pending->count}} records
                  </dd>
                </div>

                <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden sm:p-6 h-[max-content]">
                  <dt class="text-sm font-medium text-gray-500 truncate">
                    Total Lost Sales
                  </dt>
                  <dd class="mt-1 text-2xl font-semibold text-gray-700">
                    KES {{number_format($data->lost->sum,2)}}
                  </dd>
                    <dd class="mt-1 text-sm font-semibold text-gray-500">
                    Total of: {{$data->lost->count}} records
                  </dd>
                </div>
              </dl>
            </div>

            @livewire('sales-table')
        @endif
        </div>
    </div>


</x-app-layout>
