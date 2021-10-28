<x-app-layout>
     @include('layouts.includes.breadcrumb', ['crumbs'=>[
            (object)['name' => 'Zones', 'route'=>'zones'],
            (object)['name' => 'View: '.ucwords($zone->name), 'route'=>'zones'],
        ]])

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
              <!-- Stats -->
            <div>
              <h3 class="text-lg leading-6 font-medium text-gray-900">
                Site Stats
              </h3>
              <dl class="mt-3 mb-4 grid grid-cols-1 gap-5 sm:grid-cols-5">
                <div class="px-2 py-2 bg-white shadow rounded-lg overflow-hidden sm:p-3">
                  <dt class="text-sm font-medium text-gray-500 truncate">
                    Total Sales
                  </dt>
                  <dd class="mt-1 text-3xl font-semibold text-gray-900">
                      {{$zone->sales->count() ?? 0}}
                  </dd>
                </div>

                <div class="px-2 py-2 bg-white shadow rounded-lg overflow-hidden sm:p-3">
                  <dt class="text-sm font-medium text-gray-500 truncate">
                    Users Registered
                  </dt>
                  <dd class="mt-1 text-3xl font-semibold text-gray-900">
                      {{$zone->users->count() ?? 0}}
                  </dd>
                </div>

                <div class="px-2 py-2 bg-white shadow rounded-lg overflow-hidden sm:p-3">
                  <dt class="text-sm font-medium text-gray-500 truncate">
                    All Shifts
                  </dt>
                  <dd class="mt-1 text-3xl font-semibold text-gray-900">
                      {{$zone->shifts->count() ?? 0}}
                  </dd>
                </div>
              </dl>
            </div>

            <h2 class="text-2xl text-gray-700 font-bold mb-4">Details for zone: {{Str::of($zone->name)->title()}}</h2>

            <h2 class="text-2xl text-gray-500 font-semibold">Users</h2>
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col mt-2">
            @livewire('zone-users-table', ['zone'=>$zone])
            </div>

             <h2 class="text-2xl mt-5 text-gray-500 font-semibold">Shift Handovers</h2>
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col mt-2">
                @livewire('zone-shifts-table', ['zone'=>$zone])
            </div>


</x-app-layout>
