<div>
    {{-- The Master doesn't talk, he acts. --}}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
            @if (count($users) <= 0)    
                <div clss="flex">
                    <div class="h-32 w-32 bg-gray-300 rounded-full flex m-auto ring-4 ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-[6rem] w-[6rem] text-gray-400 justify-center m-auto items-center" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9 9a2 2 0 114 0 2 2 0 01-4 0z" />
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a4 4 0 00-3.446 6.032l-2.261 2.26a1 1 0 101.414 1.415l2.261-2.261A4 4 0 1011 5z" clip-rule="evenodd" />
                            </svg>
                    </div>
                    <div class="m-auto w-[440px] relative mt-5 text-center">
                        <h2 class="text-4xl font-bold text-gray-500">No users recorded yet!</h2>
                        <p class="text-gray-500 text-lg">
                            System users will appear in this section.
                        </p>
                    </div>
                </div>
            @else
            <h3 class="ml-6 text-2xl"> System Users ({{$users->count()}}) </h3>
            <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                            <th scope="col" class="px-6 py-3 text-left font-extrabold text-xs text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-extrabold text-xs text-gray-500 uppercase tracking-wider">
                                Username
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-extrabold text-xs text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-extrabold text-xs text-gray-500 uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-extrabold text-xs text-gray-500 uppercase tracking-wider">
                                Phone
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-extrabold text-xs text-gray-500 uppercase tracking-wider">
                                ID Number
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-extrabold text-xs text-gray-500 uppercase tracking-wider">
                                Active
                            </th>
                            
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{\Str::of($user->name)->title()}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{\Str::of($user->username)->title()}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$user->email}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        <div class="flex align-middle">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>
                                                    @if (count($user->roles) > 0)
                                                        {{\Str::of($user->roles[0]->name)->upper() ?? 'USER'}}
                                                    @else
                                                        {{'USER'}}
                                                    @endif
                                            </span>
                                        </td>
                                        </div>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$user->phone ?? ''}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                         {{$user->idnumber ?? ''}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                       <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                            ACTIVE
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>

                {{ $users->links() }}


            @endif
            </div>
        </div>
</div>
