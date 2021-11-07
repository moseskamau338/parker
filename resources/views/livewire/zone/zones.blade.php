 <!-- This example requires Tailwind CSS v2.0+ -->
 @if (count($zones) > 0)
 <div class="pb-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
     <h2 class="text-3xl font-bold text-gray-500">Zones ({{count($zones)}}):</h2>
    <!-- This example requires Tailwind CSS v2.0+ -->
        <div>
        <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($zones as $zone)
                <li class="col-span-1 flex shadow-sm rounded-md">
                    <div class="flex-shrink-0 flex items-center justify-center w-16 bg-blue-600 text-white text-sm font-medium rounded-l-md">
                        Zone
                    </div>
                    <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                        <div class="flex-1 px-4 py-2 text-sm truncate">
                        <a href="#" class="text-gray-900 font-medium hover:text-gray-600">{{\Str::of($zone->name)->upper()}}</a>
                        <p class="text-gray-500">{{count($zone->sales)}} sales</p>
                        </div>
                        <div class="flex-shrink-0 pr-2">
                        <a href="{{route('zones.show', ['zone'=>$zone->id])}}" type="button" class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Open options</span>
                            <!-- Heroicon name: solid/dots-vertical -->
                            <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                        </a>
                        </div>
                    </div>
                </li>
            @endforeach

        </ul>
        </div>
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