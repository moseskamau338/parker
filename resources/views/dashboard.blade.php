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
            <!-- This example requires Tailwind CSS v2.0+ -->
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Last 30 days
            </h3>
            <dl class="mt-5 grid grid-cols-1 rounded-lg bg-white overflow-hidden shadow divide-y divide-gray-200 md:grid-cols-3 md:divide-y-0 md:divide-x">
                <div class="px-4 py-5 sm:p-6">
                <dt class="text-base font-normal text-gray-900">
                    Total Customers
                </dt>
                <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                    <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                    71,897
                    <span class="ml-2 text-sm font-medium text-gray-500">
                        from 70,946
                    </span>
                    </div>

                    <div class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                    <!-- Heroicon name: solid/arrow-sm-up -->
                    <svg class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">
                        Increased by
                    </span>
                    12%
                    </div>
                </dd>
                </div>

                <div class="px-4 py-5 sm:p-6">
                <dt class="text-base font-normal text-gray-900">
                    Avg. Daily Rate
                </dt>
                <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                    <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                    58.16%
                    <span class="ml-2 text-sm font-medium text-gray-500">
                        from 56.14%
                    </span>
                    </div>

                    <div class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                    <!-- Heroicon name: solid/arrow-sm-up -->
                    <svg class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">
                        Increased by
                    </span>
                    2.02%
                    </div>
                </dd>
                </div>

                <div class="px-4 py-5 sm:p-6">
                <dt class="text-base font-normal text-gray-900">
                    Avg. Customer Traffic
                </dt>
                <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                    <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                    24.57%
                    <span class="ml-2 text-sm font-medium text-gray-500">
                        from 28.62%
                    </span>
                    </div>

                    <div class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium bg-red-100 text-red-800 md:mt-2 lg:mt-0">
                    <!-- Heroicon name: solid/arrow-sm-down -->
                    <svg class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">
                        Decreased by
                    </span>
                    4.05%
                    </div>
                </dd>
                </div>
            </dl>

             <!-- Actions panel -->
            <section aria-labelledby="quick-links-title" class="mt-10">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-5">
                    Quick Actions
                </h3>
                <div class="rounded-lg bg-gray-200 overflow-hidden shadow divide-y divide-gray-200 sm:divide-y-0 sm:grid sm:grid-cols-2 sm:gap-px">
                <h2 class="sr-only" id="quick-links-title">Quick links</h2>

                <div class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                    <div>
                    <span class="rounded-lg inline-flex p-3 bg-teal-50 text-teal-700 ring-4 ring-white">
                        <!-- Heroicon name: outline/clock -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                    </div>
                    <div class="mt-8">
                    <h3 class="text-lg font-medium">
                        <a href="#" class="focus:outline-none">
                        <!-- Extend touch target to entire panel -->
                        <span class="absolute inset-0" aria-hidden="true"></span>
                         View sales history
                        </a>
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">
                        You can view general history or filter as required.
                    </p>
                    </div>
                    <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400" aria-hidden="true">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                    </svg>
                    </span>
                </div>

                <div class="sm:rounded-tr-lg relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                    <div>
                    <span class="rounded-lg inline-flex p-3 bg-purple-50 text-purple-700 ring-4 ring-white">
                        <!-- Heroicon name: outline/badge-check -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </span>
                    </div>
                    <div class="mt-8">
                    <h3 class="text-lg font-medium">
                        <a href="#" class="focus:outline-none">
                        <!-- Extend touch target to entire panel -->
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        Shifts & Handovers
                        </a>
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Track shift changes as they happen for the various sites. <code>Note: </code> these can only be viewd per specific Zone
                    </p>
                    </div>
                    <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400" aria-hidden="true">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                    </svg>
                    </span>
                </div>

                <div class="relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                    <div>
                    <span class="rounded-lg inline-flex p-3 bg-sky-50 text-sky-700 ring-4 ring-white">
                        <!-- Heroicon name: outline/users -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </span>
                    </div>
                    <div class="mt-8">
                    <h3 class="text-lg font-medium">
                        <a href="#" class="focus:outline-none">
                        <!-- Extend touch target to entire panel -->
                        <span class="absolute inset-0" aria-hidden="true"></span>
                            Manage System Users
                        </a>
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Take charge of the system and control user permissions and roles to be used across the system.
                    </p>
                    </div>
                    <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400" aria-hidden="true">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                    </svg>
                    </span>
                </div>

                <div class="relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                    <div>
                    <span class="rounded-lg inline-flex p-3 bg-yellow-50 text-yellow-700 ring-4 ring-white">
                        <!-- Heroicon name: outline/cash -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </span>
                    </div>
                    <div class="mt-8">
                    <h3 class="text-lg font-medium">
                        <a href="#" class="focus:outline-none">
                        <!-- Extend touch target to entire panel -->
                        <span class="absolute inset-0" aria-hidden="true"></span>
                            Reciepts & Bank movements
                        </a>
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">
                        As a <mark>Manager or Admin</mark>, you can register bank transfers with their Receipt IDs as you please. These helps you organize and stay informed about your financial position.
                    </p>
                    </div>
                    <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400" aria-hidden="true">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                    </svg>
                    </span>
                </div>
                </div>
            </section>

            <h3 class="text-lg leading-6 font-medium text-gray-900 my-5">
                Top 3 Zone Sales
            </h3>
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul role="list" class="divide-y divide-gray-200">
                <li>
                <a href="#" class="block hover:bg-gray-50">
                    <div class="flex items-center px-4 py-4 sm:px-6">
                    <div class="min-w-0 flex-1 flex items-center">
                        <div class="flex-shrink-0">
                        <img class="h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>
                        <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                        <div>
                            <p class="text-sm font-medium text-indigo-600 truncate">Pangani Zone 1</p>
                            <p class="mt-2 flex items-center text-sm text-gray-500">
                            <!-- Heroicon name: solid/mail -->
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            <span class="truncate"><strong>Current shift:</strong> Mahmud Musa</span>
                            </p>
                        </div>
                        <div class="hidden md:block">
                            <div>
                            <p class="text-sm text-gray-900">
                                Total daily sales: <span class="font-bold">Ksh 20,000</span>
                                {{-- <time datetime="2020-01-07">January 7, 2020</time> --}}
                            </p>
                            <p class="mt-2 flex items-center text-sm text-gray-500">
                                <!-- Heroicon name: solid/check-circle -->
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Completed phone screening
                            </p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div>
                        <!-- Heroicon name: solid/chevron-right -->
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    </div>
                </a>
                </li>

                <li>
                <a href="#" class="block hover:bg-gray-50">
                    <div class="flex items-center px-4 py-4 sm:px-6">
                    <div class="min-w-0 flex-1 flex items-center">
                        <div class="flex-shrink-0">
                        <img class="h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>
                        <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                        <div>
                             <p class="text-sm font-medium text-indigo-600 truncate">Githurai Zone 11</p>
                            <p class="mt-2 flex items-center text-sm text-gray-500">
                            <!-- Heroicon name: solid/mail -->
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            <span class="truncate"><strong>Current shift:</strong> Kimani James</span>
                            </p>
                        </div>
                        <div class="hidden md:block">
                            <div>
                            <p class="text-sm text-gray-900">
                                Total daily sales: <span class="font-bold">Ksh 14,000</span>
                            </p>
                            <p class="mt-2 flex items-center text-sm text-gray-500">
                                <!-- Heroicon name: solid/check-circle -->
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Completed phone screening
                            </p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div>
                        <!-- Heroicon name: solid/chevron-right -->
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    </div>
                </a>
                </li>
            </ul>
            </div>







            </div>

        </div>
    </div>
</x-app-layout>
