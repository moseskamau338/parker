<x-app-layout>
  @include('layouts.includes.breadcrumb', ['crumbs'=>[
        (object)['name' => 'Users', 'route'=>'users'],
        (object)['name' => 'Create', 'route'=>'users.create'],
    ]])
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6 p-2">
            <div class="mb-4 flex justify-end">
                <a href="{{route('users.create')}}" class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium
                rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Add New User

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>

                </a>
            </div>
            <form class="space-y-8 divide-y divide-gray-200" action="{{route('create.user')}}" method="POST">
                @csrf
              <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div>
                <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                  <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                      User Details
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                      Use a permanent address where you can receive mail.
                    </p>
                  </div>
                  <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                      <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Full Name
                      </label>
                      <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="text" name="name" id="name" autocomplete="given-name" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                      </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                      <label for="last-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Username
                      </label>
                      <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="text" name="username" id="username" autocomplete="username" class="max-w-lg block w-full shadow-sm
                        focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                      </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                      <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Email address
                      </label>
                      <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input id="email" name="email" type="email" autocomplete="email" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                      </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                      <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Zone
                      </label>
                      <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <select id="zone" name="zone" autocomplete="country" class="max-w-lg block focus:ring-indigo-500
                        focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        @foreach(\App\Models\Zone::all(['id','name']) as $zone)
                          <option value="{{$zone->id}}">{{ucwords($zone->name)}}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                      <label for="phone" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Phone
                      </label>
                      <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="text" name="phone" id="phone" autocomplete="phone" class="block max-w-lg w-full
                        shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                      </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                      <label for="nat_id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        National ID
                      </label>
                      <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="number" name="nat_id" id="nat_id" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500
                        focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                      </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                      <label for="password" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Password
                      </label>
                      <div class="mt-1 flex rounded-md shadow-sm">
                      <input type="password" name="password" id="company-website" class="focus:ring-indigo-500
                      focus:border-indigo-500
                       flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300" placeholder="···················">
                      <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500
                      text-sm">
                       Generate
                      </span>
                    </div>
                    </div>

                  </div>
                </div>

                <div class="divide-y divide-gray-200 pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                  <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                      Assign Roles
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                      Be sure to assign the right roles <mark>every Role, has permissions assigned to it.</mark>
                    </p>
                      <p>
                          To manage permissions, <a href="#" class="text-indigo-400 underline">click here</a>
                      </p>
                  </div>
                  <div class="space-y-6 sm:space-y-5 divide-y divide-gray-200">
                    <div class="pt-6 sm:pt-5">
                      <div role="group" aria-labelledby="label-email">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                          <div>
                            <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700" id="label-email">
                              Choose Roles
                            </div>
                          </div>
                          <div class="mt-4 sm:mt-0 sm:col-span-2">
                            <div class="max-w-lg space-y-4">
                              <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                                  <input id="admin" name="roles[]" type="checkbox" value="admin" class="focus:ring-indigo-500 h-4 w-4
                                  text-indigo-600
                                  border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                  <label for="admin" class="font-medium text-gray-700">Admin</label>
                                  <p class="text-gray-500">Can Manage All Modules</p>
                                </div>
                              </div>
                              <div>
                                <div class="relative flex items-start">
                                  <div class="flex items-center h-5">
                                    <input id="manager" name="roles[]" type="checkbox" value="manager" class="focus:ring-indigo-500
                                    h-4 w-4
                                    text-indigo-600 border-gray-300 rounded">
                                  </div>
                                  <div class="ml-3 text-sm">
                                    <label for="manager" class="font-medium text-gray-700">Manager</label>
                                    <p class="text-gray-500">Has similar permissions to Admin, except for running code</p>
                                  </div>
                                </div>
                              </div>
                              <div>
                                <div class="relative flex items-start">
                                  <div class="flex items-center h-5">
                                    <input id="partner" name="roles[]" type="checkbox" value="partner" class="focus:ring-indigo-500
                                    h-4 w-4
                                    text-indigo-600
                                    border-gray-300 rounded">
                                  </div>
                                  <div class="ml-3 text-sm">
                                    <label for="partner" class="font-medium text-gray-700">Partner</label>
                                    <p class="text-gray-500">Has Manager permissions only for Zone data</p>
                                  </div>
                                </div>
                              </div>
                            <div>
                                <div class="relative flex items-start">
                                  <div class="flex items-center h-5">
                                    <input id="cashier" name="roles[]" type="checkbox" value="cashier" class="focus:ring-indigo-500
                                    h-4 w-4
                                    text-indigo-600
                                    border-gray-300 rounded">
                                  </div>
                                  <div class="ml-3 text-sm">
                                    <label for="cashier" class="font-medium text-gray-700">Cashier</label>
                                    <p class="text-gray-500">Has permission for daily operations like adding sales and shifts as well
                                        as viewing customer data.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="pt-5">
                <div class="flex justify-end">
                  <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                  </button>
                  <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                  </button>
                </div>
              </div>
              </div>
            </form>

    </div>
</div>
</x-app-layout>
