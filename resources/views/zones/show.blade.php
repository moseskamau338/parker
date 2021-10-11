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
                        <a href="{{route('zones')}}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">
                            {{ __('Zones') }}
                        </a>
                    </div>
                </li>
                 <li>
                    <div class="flex items-center">
                        <!-- Heroicon name: solid/chevron-right -->
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <a href="{{route('zones')}}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">
                            {{ __('View Zone: ') }} {{\Str::of($zone->name)->upper()}}
                        </a>
                    </div>
                </li>
            </ol>
            </nav>

        </h2>
    </x-slot>
    
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
            <h2 class="text-2xl text-gray-700 font-bold">Details for zone: {{Str::of($zone->name)->title()}}</h2>

            <h2 class="text-2xl text-gray-500 font-semibold">Long Term Customers</h2>
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col mt-2">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            First Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Last Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            CarRegNumber
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            AmountPaid
                        </th>
                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            DatePaid
                        </th>
                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            PaymentType
                        </th>
                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            PaymentREF
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ExpiryDate
                        </th>
                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Active
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            Zone
                        </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                            Jane
                            </div>
                        </td>
                         <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                            Cooper
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            KDC143X
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          2000 /=
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            30/9/2021
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap ">
                            MPESA
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap ">
                            YTR459TF5
                        </td>
                         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            30/10/2021
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            1
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            CBD
                        </td>
                        </tr>

                        <!-- More people... -->
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>

             <h2 class="text-2xl mt-5 text-gray-500 font-semibold">Shift Handovers</h2>
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col mt-2">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Shift No.
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Shift ID
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Shift sales
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Start Time
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Close Time
                        </th>
                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Cash in Hand (close)
                        </th>
                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Shift Sales (close)
                        </th>
                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Next Shift ID
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            Zone
                        </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                1
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                ASXZ0987Y665TR
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                4200 /=
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            7:45:00
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                17:12:09
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap ">
                                5000 /=
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap ">
                            8750 /=
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            ZXSBVTF43ED89OL
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                CBD
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                2
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                ZXSBVTF43ED89OL
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                1200 /=
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            8:00:00
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                               17:00:00
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap ">
                                5000 /=
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap ">
                            3200 /=
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            MN0098MJHT54D34
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                CBD
                            </td>
                        </tr>

                        <!-- More people... -->
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
                
        </div>


</x-app-layout>