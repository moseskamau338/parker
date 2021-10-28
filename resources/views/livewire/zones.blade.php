<div class="flex flex-col bg-white shadow-sm rounded max-w-[800px] p-3 m-auto">
     <form class="divide-gray-200" action="{{route('zones.web.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="space-y-8 divide-y divide-gray-200">
        <div>
          <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
              Add New Site
            </h3>
            <p class="mt-1 text-sm text-gray-500">
              This section allows you to create additional Sites and assign appropriate users. <br>
                Note: <mark>only Admin and Managers</mark> are allowed to access this section
            </p>
          </div>

          <div class="sm:col-span-4 mt-3">
              <label for="ref" class="block text-sm font-medium text-gray-700">
                Site Name
              </label>
              <div class="mt-1">
                <input id="name" name="name" type="text" autocomplete="name" class="shadow-sm focus:ring-indigo-500
                focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                   @error('name') <span class="text-danger mt-1">{{ $message }}</span> @enderror
              </div>
            </div>

        </div>
        <div class="pt-5">
            <div class="flex justify-end">
              <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Cancel
              </button>
              <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm
              font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2
              focus:ring-indigo-500">
                Save
              </button>
            </div>
          </div>
      </div>
    </form>

    <div class="text-center">
          <livewire:zones-table  :wire:key="'Zone-Table'" />
      </div>
</div>



