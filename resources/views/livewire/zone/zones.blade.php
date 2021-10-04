 <!-- This example requires Tailwind CSS v2.0+ -->
 @if (count($zones) > 0)
 <div class="px-64">
     <h2 class="ml-16 text-3xl font-bold text-gray-500">Zones ({{count($zones)}}):</h2>
     <!-- This example requires Tailwind CSS v2.0+ -->
     <!-- This example requires Tailwind CSS v2.0+ -->
     <div class="bg-white shadow-sm p-4 rounded mt-6 max-w-lg ml-16">
         <div class="flow-root mt-2 px-5">
             <ul role="list" class="-my-5 divide-y divide-gray-200">
                @foreach ($zones as $zone)
                    <li class="py-4">
                        <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">
                            {{\Str::of($zone->name)->upper()}}
                            </p>
                            <p class="text-sm text-gray-500 truncate">
                            @leonardkrasner
                            </p>
                        </div>
                        <div>
                            <a href="#" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                            View
                            </a>
                        </div>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
        <div class="mt-6">
            <a href="#" class="w-full flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
            View all
            </a>
        </div>
        </div>

 </div>

 @else
 <div class="text-center">
     <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
     </svg>
     <h3 class="mt-2 text-sm font-medium text-gray-900">No zones</h3>
     <p class="mt-1 text-sm text-gray-500">
         Get started by creating a new zone.
     </p>
     <div class="mt-6">
         <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
         <!-- Heroicon name: solid/plus -->
         <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
             <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
         </svg>
         New Zone
         </button>
     </div>
 </div>
 @endif