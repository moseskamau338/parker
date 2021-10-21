<x-app-layout>
  @include('layouts.includes.breadcrumb', ['crumbs'=>[
        (object)['name' => 'Users', 'route'=>'users'],
        (object)['name' => 'Manage Roles', 'route'=>'roles'],
    ]])
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6 p-2">
           <h2 class="text-2xl text-gray-500 font-bold">Manage Roles</h2>
            <form action="{{route('update.roles')}}" method="POST">
                @csrf
                <div class="flex flex-col mt-4">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg max-h-[500px] overflow-y-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                          <thead class="bg-gray-50">
                            <tr>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role Name
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Permissions
                              </th>

                            </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200">
                          @foreach(\Spatie\Permission\Models\Role::with('permissions:id,name')->get(['id','name']) as $role)
                              @php
                                $permissionIds = collect($role->permissions)->map(function($item){return $item->id;})->toArray();
                              @endphp
                                <tr>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                     <span class="capitalize text-gray-500 font-bold">
                                          - {{$role->name}}
                                     </span>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                      <div class="max-h-[200px] overflow-y-auto">
                                          @foreach(\Spatie\Permission\Models\Permission::all(['id','name']) as $permission)
                                           <div class="relative flex items-start">
                                              <div class="flex items-center h-5">
                                                <input name="permissions[]" value="{{$role->name.'.'.$permission->id}}" type="checkbox"
                                                      {{in_array($permission->id,$permissionIds) ? 'checked' : ''}}
                                                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                              </div>
                                              <div class="ml-3 text-sm">
                                                <label  class="font-medium text-gray-700">{{$permission->name}}</label>
                                              </div>
                                            </div>
                                          @endforeach
                                      </div>
                                  </td>
                                </tr>
                          @endforeach

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pt-5">
                    <div class="flex justify-end">
                      <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Reset
                      </button>
                      <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update
                      </button>
                    </div>
                  </div>
            </form>
    </div>
</div>
</x-app-layout>
