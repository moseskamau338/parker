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
       Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias animi at atque, beatae culpa ea enim eum expedita facere fugiat iure nemo obcaecati officia optio, quam quis voluptatem. Ex, repellat.
    </div>
</div>
</x-app-layout>
