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
        @if (count($sales) <= 0)    
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
           <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-left font-extrabold text-xs text-gray-500 uppercase tracking-wider">
                            Agent
                        </th>
                        <th scope="col" class="px-6 py-3 text-left font-extrabold text-xs text-gray-500 uppercase tracking-wider">
                            Customer
                        </th>
                         <th scope="col" class="px-6 py-3 text-left font-extrabold text-xs text-gray-500 uppercase tracking-wider">
                            Customer Type
                        </th>
                        <th scope="col" class="px-6 py-3 text-left font-extrabold text-xs text-gray-500 uppercase tracking-wider">
                            Vehicle
                        </th>
                        <th scope="col" class="px-6 py-3 text-left font-extrabold text-xs text-gray-500 uppercase tracking-wider">
                            Site
                        </th>
                         <th scope="col" class="px-6 py-3 text-left font-extrabold text-xs text-gray-500 uppercase tracking-wider">
                            Shift
                        </th>
                        <th scope="col" class="px-6 py-3 text-left font-extrabold text-xs text-gray-500 uppercase tracking-wider">
                            Rate
                        </th>
                        <th scope="col" class="px-6 py-3 text-left font-extrabold text-xs text-gray-500 uppercase tracking-wider">
                            Duration (Mins)
                        </th>
                        <th scope="col" class="px-6 py-3 text-left font-extrabold text-xs text-gray-500 uppercase tracking-wider">
                            Payment Method
                        </th>
                        <th scope="col" class="px-6 py-3 text-left font-extrabold text-xs text-gray-500 uppercase tracking-wider">
                            Amount
                        </th>
                         <th scope="col" class="px-6 py-3 text-left font-extrabold text-xs text-gray-500 uppercase tracking-wider">
                            Transaction Ref.
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                Moses Kamau
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Customer 1
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Short Term
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                KDC143X
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Jacaranda
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                GHT-34834723
                            </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    200/hr
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                124 mins
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                MPESA
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{number_format(124/60*200,2)}} /=
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                PGREH43572368
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                             <tr class="bg-white">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                Moses Kamau
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Customer 2
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Short Term
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                KAC123W
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Jacaranda
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                GHT-34834723
                            </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    200/hr
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                124 mins
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                CASH
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{number_format(74/60*200,2)}} /=
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                PGHS23672368
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                        {{-- @foreach ($sales as $sale)
                            <tr class="bg-white">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{\Str::of($sale->user->name)->title()}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{\Str::of($sale->customer->name)->title()}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{\Str::of($sale->vehicle->name)->title()}} ({{$sale->vehicle->plate_no}})
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                     {{\Str::of($sale->zone->name)->title()}}
                                </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                     {{$sale->rate->amount}}/hr
                                </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                     {{number_format((float)(\Carbon\Carbon::parse($sale->entry_time)->diffInMinutes($sale->leave_time)/60), 2, '.', '')}} hrs
                                </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{number_format((float)(\Carbon\Carbon::parse($sale->entry_time)->diffInMinutes($sale->leave_time)/60)*$sale->rate->amount, 2, '.', '')}} /=
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>
                        @endforeach --}}

                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>

            {{ $sales->links() }}


        @endif
        </div>
    </div>


</x-app-layout>