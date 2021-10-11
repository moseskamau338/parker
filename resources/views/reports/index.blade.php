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
            </ol>
            </nav>

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
             <h2 class="text-2xl mt-5 text-gray-500 font-semibold">Banking Report</h2>
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col mt-2">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Staff
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Sales Handover
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Staff Recieving
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Shift ID
                        </th>
                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Amount Banked
                        </th>
                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Transaction Ref.
                        </th>
                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Zone
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            Sales Banking Variance
                        </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                vkodero
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                21/1/2021
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                12000 /=
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            mmuchiri
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                               ZXSBVTF43ED89OL
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap ">
                                12000 /=
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap ">
                            QW234ZX
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            CBD
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                0 /=
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                vkodero
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                22/1/2021
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                32000 /=
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            mmuchiri
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                               MN0098MJHT54D34
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap ">
                                30000 /=
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap ">
                            ASD9809
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            CBD
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                2000 /=
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
    </div>
</x-app-layout>