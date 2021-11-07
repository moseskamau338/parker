<!-- This example requires Tailwind CSS v2.0+ -->
<div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
  <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-4 mt-2 shadow-sm flex items-center space-x-3 hover:border-gray-400
  focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
    <form class="space-y-8 divide-y divide-gray-200" action="{{route('receipts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="space-y-8 divide-y divide-gray-200">
        <div>
          <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
              Add New Receipt
            </h3>
            <p class="mt-1 text-sm text-gray-500">
              This section allows you to record additional receipts from any bank operations. <br>
                Note: <mark>only Admin and Managers</mark> are allowed to access this section
            </p>
          </div>

          <div class="sm:col-span-4 mt-3">
              <label for="ref" class="block text-sm font-medium text-gray-700">
                Receipt Number/Ref.
              </label>
              <div class="mt-1">
                <input id="ref" name="ref" type="text" autocomplete="ref" class="shadow-sm focus:ring-indigo-500
                focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                   @error('ref') <span class="text-danger mt-1">{{ $message }}</span> @enderror
              </div>
            </div>

             <div class="sm:col-span-4 mt-3">
              <label for="amount" class="block text-sm font-medium text-gray-700">
                Amount
              </label>
              <div class="mt-1">
                <input id="amount" name="amount" type="number" autocomplete="amount" class="shadow-sm
                focus:ring-indigo-500
                focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                  @error('amount') <span class="text-danger mt-1">{{ $message }}</span> @enderror
              </div>
            </div>
         <div class="sm:col-span-6 mt-3">
              <label for="cover-photo" class="block text-sm font-medium text-gray-700">
                Receipt Note (File)
              </label>
              <input name="receipt" accept=".pdf,.jpg,.png,.jpeg" type="file">
            </div>
            @error('file') <span class="error">{{ $message }}</span> @enderror
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
    </form>
  </div>

  <div class="text-center">
              @if($count > 0)
                   <livewire:receipt-table  :wire:key="'Receipt-Table'">
              @else
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z" />
                </svg>
                  <h3 class="mt-2 text-sm font-medium text-gray-900">No Receipts added</h3>
                  <p class="mt-1 text-sm text-gray-500">
                    Get started by creating a new project.
                  </p>
                  <div class="mt-6">
                    <button disabled type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium
                    rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      <!-- Heroicon name: solid/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                      Create new entry
                    </button>
                  </div>
              @endif

        </div>

</div>
